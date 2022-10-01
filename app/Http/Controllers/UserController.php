<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::when($request->sort_by, function ($query, $value) {
            $query->orderBy($value, request('order_by', 'asc'));
        })
            ->when(!isset($request->sort_by), function ($query) {
                $query->latest();
            })
            ->when($request->search, function ($query, $value) {
                $query->where('firstName', 'LIKE', '%' . $value . '%')
                    ->orWhere('middleName', 'LIKE', '%' . $value . '%')
                    ->orWhere('lastName', 'LIKE', '%' . $value . '%')
                    ->orWhere('username', 'LIKE', '%' . $value . '%')
                    ->orWhere('email', 'LIKE', '%' . $value . '%');
            })
            ->paginate($request->page_size ?? 10);

        return Inertia::render('Users/Index', ['users' => $users]);
        //asset('storage/'. $users->image)
    }

    public function store(Request $request)
    {
        $image = '';

        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:5048',
            'firstName' => 'required|string|alpha',
            'middleName' => 'string|alpha|nullable',
            'lastName' => 'required|string|alpha',
            'suffix' => 'string|alpha|nullable',
            'email' => 'required|email|unique:users,email|max:40',
            'username' => 'required|string|unique:users,username|max:14',
            'password' => 'required|min:8',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('image', 'public');
        }

        User::create([
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'suffix' => $request->suffix,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'image' => $image,
        ]);

        return redirect()->back();
    }

    public function update(User $user, Request $request)
    {
        $image = $user->image;

        $request->validate([
            // 'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:5048',
            'firstName' => 'required|string|alpha',
            'middleName' => 'string|alpha|nullable',
            'lastName' => 'required|string|alpha',
            'suffix' => 'string|alpha|nullable',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'username' => [
                'required',
                'string',
                'max:14',
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'required|min:8',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $user->image);
            $image = $request->file('image')->store('image', 'public');
        }

        $user->update([
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'suffix' => $request->suffix,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'image' => $image
        ]);

        return redirect()->back();
    }

    public function destroy(User $user)
    {
        Storage::delete('public/' . $user->image);

        $user->delete();

        return redirect()->back();
    }
}

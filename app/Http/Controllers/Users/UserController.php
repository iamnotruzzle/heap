<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->sort_by, function ($query, $value) {
            $query->orderBy($value, request('order_by', 'asc'));
        })
            // ->when(!isset($request->sort_by), function ($query) {
            //     $query->latest();
            // })
            ->when($request->search, function ($query, $value) {
                $query->where('firstName', 'LIKE', '%' . $value . '%')
                    ->orWhere('middleName', 'LIKE', '%' . $value . '%')
                    ->orWhere('lastName', 'LIKE', '%' . $value . '%')
                    ->orWhere('username', 'LIKE', '%' . $value . '%');
            })
            ->paginate($request->page_size ?? 15);

        return Inertia::render('Users/Index', ['users' => $users]);
    }

    public function store(Request $request)
    {

        $image = '';

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
            'firstName' => 'required|string',
            'middleName' => 'string|nullable',
            'lastName' => 'required|string',
            'suffix' => 'string|nullable',
            // 'permissions' => 'required',
            'username' => 'required|string|unique:users,username|max:14',
            'password' => 'required|min:8',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('image', 'public');
        } else {
            $image = null;
        }

        $user = User::create([
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'suffix' => $request->suffix,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'image' => $image,
            'status' => $request->status,
        ]);

        // assign role
        $user->assignRole('super-admin');

        // return redirect()->back();
        return Redirect::route('users.index');
    }

    public function update(User $user, Request $request)
    {
        // dd($request->image);

        $image = $user->image;

        if ($request->password != null || $request->password != '') {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
                'firstName' => 'required|string',
                'middleName' => 'string|nullable',
                'lastName' => 'required|string',
                'suffix' => 'string|nullable',
                // 'permissions' => 'required',
                'username' => [
                    'required',
                    'string',
                    'max:14',
                    Rule::unique('users')->ignore($user->id)
                ],
                'password' => 'required|min:8',
                'status' => 'required',
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
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'image' => $image,
                'status' => $request->status,
            ]);
        } else {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
                'firstName' => 'required|string',
                'middleName' => 'string|nullable',
                'lastName' => 'required|string',
                'suffix' => 'string|nullable',
                // 'permissions' => 'required',
                'username' => [
                    'required',
                    'string',
                    'max:14',
                    Rule::unique('users')->ignore($user->id)
                ],
                'status' => 'required',
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
                'username' => $request->username,
                'image' => $image,
                'status' => $request->status,
            ]);
        }

        // update user role
        $user->syncRoles('super-admin');


        // return redirect()->back();
        return Redirect::route('users.index');
    }

    public function destroy(User $user)
    {
        Storage::delete('public/' . $user->image);

        $user->delete();

        // remove user role
        $user->roles()->detach();

        // return redirect()->back();
        return Redirect::route('users.index');
    }
}

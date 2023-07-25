<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLocations;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('userLocations')
            ->when($request->sort_by, function ($query, $value) {
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
            ->where('username', '!=', 'sa')
            ->paginate($request->page_size ?? 15);

        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->locations);

        $image = '';

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
            'firstName' => 'required|string',
            'middleName' => 'string|nullable',
            'lastName' => 'required|string',
            'suffix' => 'string|nullable',
            'username' => 'required|string|unique:users,username|max:14',
            'password' => 'required|min:8',
            'status' => 'required',
            'locations' => 'required',
            'role' => 'required',
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
            'role' => $request->role,
        ]);

        foreach ($request->locations as $x) {
            UserLocations::create([
                'wardcode' => $x,
                'user_id' => $user->id,
            ]);
        }

        // assign role
        $user->assignRole('super-admin');

        // return redirect()->back();
        return Redirect::route('users.index');
    }

    public function update(User $user, Request $request)
    {
        // dd($request->locations);

        $image = $user->image;

        if ($request->password != null || $request->password != '') {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
                'firstName' => 'required|string',
                'middleName' => 'string|nullable',
                'lastName' => 'required|string',
                'suffix' => 'string|nullable',
                'username' => [
                    'required',
                    'string',
                    'max:14',
                    Rule::unique('users')->ignore($user->id)
                ],
                'password' => 'required|min:8',
                'status' => 'required',
                'role' => 'required',
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
                'role' => $request->role,
            ]);

            // delete then assign locations
            UserLocations::where('user_id', $user->id)->delete();
            dd($$request->locations);
            foreach ($request->locations as $x) {
                UserLocations::create([
                    'wardcode' => $x,
                    'user_id' => $user->id,
                ]);
            }
        } else {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
                'firstName' => 'required|string',
                'middleName' => 'string|nullable',
                'lastName' => 'required|string',
                'suffix' => 'string|nullable',
                'username' => [
                    'required',
                    'string',
                    'max:14',
                    Rule::unique('users')->ignore($user->id)
                ],
                'status' => 'required',
                'role' => 'required',
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
                'role' => $request->role,
            ]);

            // delete then assign locations
            UserLocations::where('user_id', $user->id)->delete();
            foreach ($request->locations as $x) {
                UserLocations::create([
                    'wardcode' => $x,
                    'user_id' => $user->id,
                ]);
            }
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

        UserLocations::where('user_id', $user->id)->delete();

        // return redirect()->back();
        return Redirect::route('users.index');
    }
}

<?php

namespace App\Http\Controllers\Users\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        // dd(Auth::user());

        $profile = Auth::user();

        return Inertia::render('Users/Profile/Index', [
            'profile' => $profile,
        ]);
    }

    public function store(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        $image = $user->image;

        if ($request->password != null || $request->password != '') {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
                'firstName' => 'required|string',
                'middleName' => 'string|nullable',
                'lastName' => 'required|string',
                'suffix' => 'string|nullable',
                'password' => 'required|min:8',
            ]);

            if ($request->hasFile('image')) {
                Storage::delete('public/' . $user->image);
                $image = $request->file('image')->store('image', 'public');
            }

            User::where('id', $request->id)
                ->update([
                    'firstName' => $request->firstName,
                    'middleName' => $request->middleName,
                    'lastName' => $request->lastName,
                    'suffix' => $request->suffix,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'image' => $image,
                ]);
        } else {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
                'firstName' => 'required|string',
                'middleName' => 'string|nullable',
                'lastName' => 'required|string',
                'suffix' => 'string|nullable',
            ]);

            if ($request->hasFile('image')) {
                Storage::delete('public/' . $user->image);
                $image = $request->file('image')->store('image', 'public');
            }

            User::where('id', $request->id)
                ->update([
                    'firstName' => $request->firstName,
                    'middleName' => $request->middleName,
                    'lastName' => $request->lastName,
                    'suffix' => $request->suffix,
                    'username' => $request->username,
                    'image' => $image,
                ]);
        }

        // return redirect()->back();
        return Redirect::route('profile.index');
    }

    // public function update(User $user, Request $request)
    // {
    //     // dd($request);

    //     $image = $request->image;

    //     if ($request->password != null || $request->password != '') {
    //         $request->validate([
    //             'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
    //             'firstName' => 'required|string',
    //             'middleName' => 'string|nullable',
    //             'lastName' => 'required|string',
    //             'suffix' => 'string|nullable',
    //             'password' => 'required|min:8',
    //         ]);

    //         if ($request->hasFile('image')) {
    //             Storage::delete('public/' . $user->image);
    //             $image = $request->file('image')->store('image', 'public');
    //         }

    //         User::where('id', $request->id)
    //             ->update([
    //                 'firstName' => $request->firstName,
    //                 'middleName' => $request->middleName,
    //                 'lastName' => $request->lastName,
    //                 'suffix' => $request->suffix,
    //                 'username' => $request->username,
    //                 'password' => Hash::make($request->password),
    //                 'image' => $image,
    //             ]);
    //     } else {
    //         $request->validate([
    //             'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
    //             'firstName' => 'required|string',
    //             'middleName' => 'string|nullable',
    //             'lastName' => 'required|string',
    //             'suffix' => 'string|nullable',
    //         ]);

    //         if ($request->hasFile('image')) {
    //             Storage::delete('public/' . $user->image);
    //             $image = $request->file('image')->store('image', 'public');
    //         }

    //         $a = User::where('id', $request->id)
    //             ->update([
    //                 'firstName' => $request->firstName,
    //                 'middleName' => $request->middleName,
    //                 'lastName' => $request->lastName,
    //                 'suffix' => $request->suffix,
    //                 'username' => $request->username,
    //                 'image' => $image,
    //             ]);
    //     }

    //     // return redirect()->back();
    //     return Redirect::route('profile.index');
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}

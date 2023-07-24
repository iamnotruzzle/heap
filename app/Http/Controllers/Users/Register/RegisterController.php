<?php

namespace App\Http\Controllers\Users\Register;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Users/Register/Index', []);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5048',
            'firstName' => 'required|string',
            'middleName' => 'string|nullable',
            'lastName' => 'required|string',
            'suffix' => 'string|nullable',
            'username' => 'required|string|unique:users,username|max:14',
            'password' => 'required|min:8',
            'status' => 'required',
        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'suffix' => $request->suffix,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'image' => null,
            'status' => $request->status,
        ]);

        // assign role
        $user->assignRole('super-admin');

        return Redirect::back();
    }
}

<?php

namespace App\Http\Controllers\Users\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Profile/Index', [
            // 'profile' => $profile,
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    // public function destroy($id)
    // {
    //     //
    // }
}

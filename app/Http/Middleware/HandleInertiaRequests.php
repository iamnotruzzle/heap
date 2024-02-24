<?php

namespace App\Http\Middleware;

use App\Models\LoginHistory;
use App\Models\Offices;
use App\Models\PssLocation;
use App\Models\Services;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            // Lazily
            'auth.user' => fn () => $request->user()
                ? $request->user()->only('id', 'firstName', 'middleName', 'lastName', 'username', 'image')
                : null,
            'auth.user.roles' => function () use ($request) {
                return ($request->user() ? $request->user()->roles()->pluck('name') : null);
            },
            'flash' => [
                'message' => fn () => $request->session()->get('message')
            ],
            'pss_location' => function () {
                // return PssLocation::where('wardcode', '!=', 'admin')->get(['wardcode', 'wardname']);
                return PssLocation::get(['wardcode', 'wardname']);
            },
            'ward_location' => function () {
                return
                    Ward::where('wardstat', 'A')
                    ->where('wardcode', '!=', 'ADMIN')
                    ->where('wardcode', '!=', 'CSR')
                    ->get(['wardcode', 'wardname']);
            },
            'offices' => function () {
                return Offices::where('status', '=', 'A')
                    ->orderBy('name', 'ASC')
                    ->get(['id', 'name']);
            },
            'services' => function () {
                return Services::where('status', '=', 'A')
                    ->orderBy('name', 'ASC')
                    ->get(['id', 'name']);
            },
            'auth.user.currentLocation' => function () use ($request) {
                return ($request->user() ? LoginHistory::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->first() : null);
            },
            'auth.approved_location' => function () use ($request) {
                return ($request->user() ? User::with('userLocations')->where('id', Auth::user()->id)->first() : null);
            },
        ]);
    }
}

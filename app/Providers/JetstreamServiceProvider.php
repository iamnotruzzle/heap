<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::with('userLocations')->where('username', $request->login)->first();
            $userLocation = array();
            foreach ($user->userLocations as $e) {
                array_push($userLocation, $e->wardcode);
            }

            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->status != 'activated') {
                    throw ValidationException::withMessages(["Your account is not activated yet."]);
                } else {
                    if (in_array($request->location, $userLocation)) {
                        return $user;
                    } else {
                        throw ValidationException::withMessages(["You don't have permission to login on this location."]);
                    }
                }
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}

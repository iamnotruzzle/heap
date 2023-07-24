<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserLocations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles
        $superAdminRole = Role::create(['name' => 'super-admin']);

        // create users permissions
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        // create default user
        $superAdminUser = User::factory()->create([
            'firstName' => 'super',
            'middleName' => null,
            'lastName' => 'admin',
            'suffix' => null,
            'username' => 'sa',
            'image' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        UserLocations::create([
            'wardcode' => 'admin',
            'user_id' => $superAdminUser->id,
        ]);


        // assign role to the created super-admin user
        $superAdminUser->assignRole($superAdminRole);

        // $user->givePermissionTo([
        //     // users
        //     'create-icu-bed',
        //     'create-icu-bed-entry',
        //     'create-non-icu-bed',
        // ]);
    }
}

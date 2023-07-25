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
            'role' => 'super-admin',
            'password' => '$2y$10$DNZVs1Gvd/nZKXzktIij2Obcm4ghT/.GKp3ltd2K3dKpgsEwwDFjS', // pinakb3t
            'remember_token' => Str::random(10),
        ]);

        $adminUser = User::factory()->create([
            'firstName' => 'Charo',
            'middleName' => null,
            'lastName' => 'Galang',
            'suffix' => null,
            'username' => 'cgg8',
            'image' => null,
            'role' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $sa = UserLocations::create([
            'wardcode' => 'admin',
            'user_id' => $superAdminUser->id,
        ]);

        $admin = UserLocations::create([
            'wardcode' => 'petro',
            'user_id' => $adminUser->id,
        ]);


        // assign role to the created super-admin user
        $superAdminUser->assignRole($superAdminRole);
        $adminUser->assignRole($superAdminRole);

        // $user->givePermissionTo([
        //     // users
        //     'create-icu-bed',
        //     'create-icu-bed-entry',
        //     'create-non-icu-bed',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
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
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

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
            'email' => 'sa@example.com',
            'image' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $adminUser = User::factory()->create([
            'firstName' => 'admin',
            'middleName' => null,
            'lastName' => 'admin',
            'suffix' => null,
            'username' => 'admin',
            'email' => 'adm@example.com',
            'image' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $editorUser = User::factory()->create([
            'firstName' => 'editor',
            'middleName' => null,
            'lastName' => 'editor',
            'suffix' => null,
            'username' => 'editor',
            'email' => 'editor@example.com',
            'image' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // assign role to the created super-admin user
        $superAdminUser->assignRole($superAdminRole);

        // assign role to the created admin user
        $adminUser->assignRole($adminRole);

        // assign role to the created editor user
        $editorUser->assignRole($editorRole);

        // $editorUser->givePermissionTo([
        //     // users
        //     'create-icu-bed',
        //     'create-icu-bed-entry',
        //     'create-non-icu-bed',
        //     'create-non-icu-bed-entry',
        //     'create-suspect',
        //     'create-probable',
        //     'create-confirmed',
        //     'create-waitlisted',
        //     'create-ndd',
        //     'create-hcw-confirmed',
        //     'create-hcw-quarantined',
        //     'create-hcw-per-division',
        //     'create-c19-equipment',
        //     'create-c19-equipment-entry',
        //     'create-c19-mv-area',
        //     'create-c19-mv-area-entry',
        //     'create-non-c19-mv-area',
        //     'create-non-c19-mv-area-entry',
        //     'create-medical-oxygen',
        //     'create-compressed-air',
        //     'create-flask-type',
        //     'create-c19-supplies'
        // ]);
    }
}

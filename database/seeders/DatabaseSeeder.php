<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleAndPermissionSeeder::class,
            HospitalStaffSeeder::class,
            QuestionSeeder::class,
            OptQuestionSeeder::class,
            ReligionSeeder::class,
            OtherDepartmentsSeeder::class,
            OutpatientDeptSeeder::class,
        ]);
    }
}

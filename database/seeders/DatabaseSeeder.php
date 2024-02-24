<?php

namespace Database\Seeders;

use App\Models\SurveyTagalogQuestions;
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
            SurveyEnglishQuestionsSeeder::class,
            SurveyIlocoQuestionsSeeder::class,
            SurveyTagalogQuestionsSeeder::class,
            LocationsSeeder::class,
            OfficesSeeder::class,
        ]);
    }
}

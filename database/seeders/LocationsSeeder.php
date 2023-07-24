<?php

namespace Database\Seeders;

use App\Models\PssLocation;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = [
            [
                'wardcode' => 'admin',
                'wardname' => 'Admin',
            ],
            [
                'wardcode' => 'omcc',
                'wardname' => 'Office of the medical center chief',
            ],
            [
                'wardcode' => 'petro',
                'wardname' => 'Professional education, training and research office',
            ],
        ];

        PssLocation::insert($location);
    }
}

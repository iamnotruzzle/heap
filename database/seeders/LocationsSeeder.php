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
            [
                'wardcode' => 'ipcc',
                'wardname' => 'Infection prevention control committee',
            ],
            [
                'wardcode' => 'hlk',
                'wardname' => 'Heart lung kidney',
            ],
            [
                'wardcode' => 'er',
                'wardname' => 'Emergency room',
            ],
            [
                'wardcode' => 'cendu',
                'wardname' => 'Central endoscopy unit',
            ],
            [
                'wardcode' => 'or',
                'wardname' => 'Operating room',
            ],
            [
                'wardcode' => '3fmhr',
                'wardname' => '3rd floor main (High Risk)',
            ],
            [
                'wardcode' => 'gfew',
                'wardname' => 'Ground floor eastern ward',
            ],
        ];

        PssLocation::insert($location);
    }
}

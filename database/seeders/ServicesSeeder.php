<?php

namespace Database\Seeders;

use App\Models\ServiceAvailed;
use App\Models\Services;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Consultation',
                'Status' => 'A',
            ],
            [
                'name' => 'Admission',
                'Status' => 'A',
            ],
            [
                'name' => 'Laboratory',
                'Status' => 'A',
            ],
            [
                'name' => 'Radiology',
                'Status' => 'A',
            ],
            [
                'name' => 'Discharge',
                'Status' => 'A',
            ],
            [
                'name' => 'Settlement of fees',
                'Status' => 'A',
            ],
            [
                'name' => 'Request for Medical Records',
                'Status' => 'A',
            ],
            [
                'name' => 'Requests for Psychosocial Assessment/Intervention',
                'Status' => 'A',
            ],
            [
                'name' => 'Request for Financial Assistance',
                'Status' => 'A',
            ],
            [
                'name' => 'Counselling (ie. Nutrition and Dietetics)',
                'Status' => 'A',
            ],
            [
                'name' => 'Other Services',
                'Status' => 'A',
            ],
        ];

        Services::insert($services);
    }
}

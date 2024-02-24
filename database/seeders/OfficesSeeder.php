<?php

namespace Database\Seeders;

use App\Models\Offices;
use Illuminate\Database\Seeder;

class OfficesSeeder extends Seeder
{
    public function run()
    {
        $offices = [
            [
                'name' => 'Admitting',
            ],
            [
                'name' => 'Medical Social Service/Malasakit Center',
            ],
            [
                'name' => 'Radiology',
            ],
            [
                'name' => 'Pharmacy',
            ],
            [
                'name' => 'Emergency Room',
            ],
            [
                'name' => 'Billing & claims',
            ],
            [
                'name' => 'Cashier',
            ],
            [
                'name' => 'Health Information Management/Medical Records Office',
            ],
            [
                'name' => 'Laboratory',
            ],
            [
                'name' => 'Internal Medicine',
            ],
            [
                'name' => 'OBGYNE',
            ],
            [
                'name' => 'Pediatrics',
            ],
            [
                'name' => 'Surgery',
            ],
            [
                'name' => 'Orthopedics',
            ],
            [
                'name' => 'ENT',
            ],
            [
                'name' => 'Ophthalmology',
            ],
            [
                'name' => 'Family Medicine',
            ],
            [
                'name' => 'Dental',
            ],
            [
                'name' => 'PT/Rehab',
            ],
            [
                'name' => 'Acute Psychiatric Unit',
            ],
            [
                'name' => 'Blood Bank',
            ],
            [
                'name' => 'Cancer Unit/Oncology',
            ],
            [
                'name' => 'Nuclear Medicine',
            ],
            [
                'name' => 'OPD information',
            ],
            [
                'name' => 'Nutrition and Dietetics',
            ],
            [
                'name' => 'Hemodialysis',
            ],
            [
                'name' => 'CENDU',
            ],
            [
                'name' => 'WCPU',
            ],
        ];

        Offices::insert($offices);
    }
}

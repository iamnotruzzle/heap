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
                'status' => 'A',
            ],
            [
                'name' => 'Medical Social Service/Malasakit Center',
                'status' => 'A',
            ],
            [
                'name' => 'Radiology',
                'status' => 'A',
            ],
            [
                'name' => 'Pharmacy',
                'status' => 'A',
            ],
            [
                'name' => 'Emergency Room',
                'status' => 'A',
            ],
            [
                'name' => 'Billing & claims',
                'status' => 'A',
            ],
            [
                'name' => 'Cashier',
                'status' => 'A',
            ],
            [
                'name' => 'Health Information Management/Medical Records Office',
                'status' => 'A',
            ],
            [
                'name' => 'Laboratory',
                'status' => 'A',
            ],
            [
                'name' => 'Internal Medicine',
                'status' => 'A',
            ],
            [
                'name' => 'OBGYNE',
                'status' => 'A',
            ],
            [
                'name' => 'Pediatrics',
                'status' => 'A',
            ],
            [
                'name' => 'Surgery',
                'status' => 'A',
            ],
            [
                'name' => 'Orthopedics',
                'status' => 'A',
            ],
            [
                'name' => 'ENT',
                'status' => 'A',
            ],
            [
                'name' => 'Ophthalmology',
                'status' => 'A',
            ],
            [
                'name' => 'Family Medicine',
                'status' => 'A',
            ],
            [
                'name' => 'Dental',
                'status' => 'A',
            ],
            [
                'name' => 'PT/Rehab',
                'status' => 'A',
            ],
            [
                'name' => 'Acute Psychiatric Unit',
                'status' => 'A',
            ],
            [
                'name' => 'Blood Bank',
                'status' => 'A',
            ],
            [
                'name' => 'Cancer Unit/Oncology',
                'status' => 'A',
            ],
            [
                'name' => 'Nuclear Medicine',
                'status' => 'A',
            ],
            [
                'name' => 'OPD information',
                'status' => 'A',
            ],
            [
                'name' => 'Nutrition and Dietetics',
                'status' => 'A',
            ],
            [
                'name' => 'Hemodialysis',
                'status' => 'A',
            ],
            [
                'name' => 'CENDU',
                'status' => 'A',
            ],
            [
                'name' => 'WCPU',
                'status' => 'A',
            ],
        ];

        Offices::insert($offices);
    }
}

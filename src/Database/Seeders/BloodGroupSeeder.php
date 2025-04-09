<?php

namespace Kawsar\BloodGroup\Database\Seeders;

use Illuminate\Database\Seeder;
use Kawsar\BloodGroup\Models\BloodGroup;

class BloodGroupSeeder extends Seeder
{
    public function run()
    {
        $groups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

        foreach ($groups as $group) {
            BloodGroup::firstOrCreate(['name' => $group]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SeatCategories;

class SeatCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeatCategories::insert([
            [
                'name' => 'silver',
                'reserved_percentage' => '25',
                'created_at'  => date('Y-m-d h:i:s'),
                'updated_at'  => date('Y-m-d h:i:s')
            ],
            [
                'name' => 'gold',
                'reserved_percentage' => '40',
                'created_at'  => date('Y-m-d h:i:s'),
                'updated_at'  => date('Y-m-d h:i:s')
            ],
            [
                'name' => 'platinum',
                'reserved_percentage' => '35',
                'created_at'  => date('Y-m-d h:i:s'),
                'updated_at'  => date('Y-m-d h:i:s')
            ],
        ]
        );
    }
}

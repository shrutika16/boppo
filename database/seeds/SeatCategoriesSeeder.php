<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\SeatCategories;

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
                'name' => 'Silver',
                'reserved_percentage' => '25',
                'category_rank' => 1,
                'price_order' => 3,
                'price_percentage' => '80',
                'percentage_of_category_id' => 2,
                'created_at'  => date('Y-m-d h:i:s'),
                'updated_at'  => date('Y-m-d h:i:s')
            ],
            [
                'name' => 'Gold',
                'reserved_percentage' => '40',
                'category_rank' => 2,
                'price_order' => 2,
                'price_percentage' => '70',
                'percentage_of_category_id' => 3,
                'created_at'  => date('Y-m-d h:i:s'),
                'updated_at'  => date('Y-m-d h:i:s')
            ],
            [
                'name' => 'Platinum',
                'reserved_percentage' => '35',
                'category_rank' => 3,
                'price_order' => 1,
                'price_percentage' => null,
                'percentage_of_category_id' => null,
                'created_at'  => date('Y-m-d h:i:s'),
                'updated_at'  => date('Y-m-d h:i:s')
            ]
        ]
        );
    }
}

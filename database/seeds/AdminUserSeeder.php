<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Shrutika Dumbre',
            'email' => 'shrutika16dumbre@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at'  => date('Y-m-d h:i:s'),
            'updated_at'  => date('Y-m-d h:i:s')
        ]);
    }
}

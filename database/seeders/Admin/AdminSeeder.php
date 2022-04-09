<?php

namespace Database\Seeders\Admin;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            Admin::create([
            'name'=>'admin',
            'email'=>'admin@dev.com',
            'password'=>bcrypt(123456789),
            'phone'=>'01288587519',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::where('email', 'admin@gmail.com')->first();
        if (!$user)
        {
            $user = new Admin();
            $user->name = 'Administrator';
            $user->username = 'admin';
            $user->email = 'admin@gmail.com';
            $user->password = Hash::make('admin');
            $user->save();
        }

    }
}

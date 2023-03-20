<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Payment;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Variant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'ahmadfauzan',
            'name' => 'Ahmad Fauzan',
            'gender' => 'Laki-laki',
            'date_of_birth' => '2005-08-15',
            'email' => 'ahmadfzn@gmail.com',
            'phone_number' => '081287999762',
            'address' => 'kp.Cinusa girang',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'filbas',
            'name' => 'Filbas HS',
            'gender' => 'Laki-laki',
            'date_of_birth' => '2006-02-12',
            'email' => 'filbas@gmail.com',
            'phone_number' => '083100159757',
            'address' => 'kp.Carik',
            'password' => bcrypt('12345678'),
            'role' => 'user'
        ]);

        Payment::create([
            'payment_method' => 'COD'
        ]);

        Payment::create([
            'payment_method' => 'Dana'
        ]);

        Payment::create([
            'payment_method' => 'Transfer'
        ]);
    }
}

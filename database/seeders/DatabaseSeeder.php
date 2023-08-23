<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run(): void
    {
        if (!User::where('email', 'gubatmomsandkidsclinic@gmail.com')->first()) {
            $user = User::create([
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'gender' => 'Female',
                'birthdate' => '1999-01-01',
                'contact_number' => '09123456789',
                'address' => 'Brgy Manook. Gubat, Sorsogon',
                'email' => 'gubatmomsandkidsclinic@gmail.com',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
            ]);
        }
    }
}

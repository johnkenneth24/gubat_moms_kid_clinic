<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run(): void
    {

        if (!Role::where('name', 'staff')->exists()) {
            Role::create(['name' => 'staff']);
        }

        if (!Role::where('name', 'pediatrician')->exists()) {
            Role::create(['name' => 'pediatrician']);
        }

        if (!Role::where('name', 'patient')->exists()) {
            Role::create(['name' => 'patient']);
        }

        if (!User::where('email', 'pediatrician@email.com')->first()) {
            $user = User::create([
                'firstname' => 'Geraldine Gay',
                'lastname' => 'Frilles',
                'gender' => 'Female',
                'birthdate' => '1999-01-01',
                'contact_number' => '09123456789',
                'address' => 'Brgy Manook. Gubat, Sorsogon',
                'email' => 'pediatrician@email.com',
                'password' => Hash::make('pediatrician12345'),
            ]);
            $user->assignRole('pediatrician');
        }

        if (!User::where('email', 'staff@email.com')->first()) {
            $user = User::create([
                'firstname' => 'Staff',
                'lastname' => 'Dela Cruz',
                'gender' => 'Male',
                'birthdate' => '1999-01-01',
                'contact_number' => '09123456789',
                'address' => 'Brgy Manook. Gubat, Sorsogon',
                'email' => 'staff@email.com',
                'password' => Hash::make('staff12345'),
            ]);
            $user->assignRole('staff');
        }
    }
}

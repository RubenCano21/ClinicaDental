<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      User::create([
        "name"=> "Cris",
        "email"=> "adm@gmail.com",
          'password' => Hash::make('12345678'),
      ])->assignRole("Administrador");

      User::create([
        "name"=> "Odontologo1",
        "email"=> "Odontologo1@gmail.com",
          'password' => Hash::make('12345678'),
      ])->assignRole("Odontologo");

      User::create([
        "name"=> "Odontologo2",
        "email"=> "Odontologo2@gmail.com",
          'password' => Hash::make('12345678'),
      ])->assignRole("Odontologo");
    }

}

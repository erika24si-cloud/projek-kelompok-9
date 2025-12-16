<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Admin',
        'email'=> 'erika24si@mahasiswa.pcr.ac.id',
        'password'=> Hash::make('erika') 
        ]);
    }
}

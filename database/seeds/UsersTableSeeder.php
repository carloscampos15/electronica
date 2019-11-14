<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        App\User::create([
            'name' => 'usuario', 
            'surname' => 'administrador',
            'role_id' => 1,
            'cedula' => "123456789",
            'phone' => "123456789", 
            'address' => "123456789", 
            'email' => "admin@gmail.com", 
            'password' => Hash::make("hola123")
        ]);

        
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = App\User::create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'cedula' => "12376312",
            'phone' => "12390837",
            'address' => "cra 25 #26-7",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret')
        ]);

        $userAdmin->assignRole('admin');
    }
}

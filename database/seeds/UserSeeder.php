<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    
    public function run()
    {
        $admin = [
            'name'             => 'Admin',
            'lastname'         => '',
            'email'            => 'admin@admin.com',
            'email_verified_at'=> now(),
            'password'         => \Hash::make('123456'),
            'role'             => 'admin'
        ];
        
        User::firstOrCreate($admin);
        
        
    }
}

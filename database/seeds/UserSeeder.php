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
            'name'     => 'Jessica',
            'lastname' => 'Alba',
            'email'    => 'admin@admin.com',
            'password' => \Hash::make('123456'),
            'role'     => 'admin'
        ];

        User::firstOrCreate($admin);

       
    }
}

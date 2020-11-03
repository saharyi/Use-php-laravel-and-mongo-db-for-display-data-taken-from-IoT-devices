<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTabalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

           'name'  =>'sahar',
           'email' =>'sahar.ghassabi.76@gmail.com',
           'password'=>Hash::make('password'),
           'rememberToken' =>str_random(10),

        ]);
    }
}

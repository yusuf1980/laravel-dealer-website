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
        App\User::create(['name'=>'Admin','email'=>'yugojiro@gmail.com','password'=>Hash::make('inIuntukAdmiN'),'image'=>'users/logo-small.png']);
    }
}

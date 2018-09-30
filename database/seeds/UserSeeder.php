<?php

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
        $userAdmin = new \App\User();
        $userAdmin->name   = 'admin';
        $userAdmin->email = 'admin@gmail.com';
        $userAdmin->password  = \Illuminate\Support\Facades\Hash::make('admin');
        $userAdmin->image = ' ';
        $userAdmin->save();

        \App\Role::giveRole($userAdmin->id,1);
    }
}

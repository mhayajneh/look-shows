<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Administrator'; // optional
        $admin->description  = 'Have access to admin panel and users management'; // optional
        $admin->save();

        $editor = new \App\Role();
        $editor->name         = 'editor';
        $editor->display_name = 'Editor'; // optional
        $editor->description  = 'Allowed to manage series and episodes'; // optional
        $editor->save();

        $editor = new \App\Role();
        $editor->name         = 'user';
        $editor->display_name = 'User'; // optional
        $editor->description  = 'Can watch episodes'; // optional
        $editor->save();
    }
}

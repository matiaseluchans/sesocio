<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' =>1, 'name' => 'Admin'],
            ['id' =>2,'name' => 'Analist'],
            ['id' =>3,'name' => 'Guest'],
            ['id' =>4,'name' => 'Partner'],
        ]);
    }
}
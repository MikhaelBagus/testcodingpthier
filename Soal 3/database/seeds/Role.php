<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ms_role')->insert([
            'role_name'            =>  'Admin',
            'created_at'           =>  '2019-01-30 00:00:00'
        ]);

        DB::table('ms_role')->insert([
            'role_name'            =>  'User',
            'created_at'           =>  '2019-01-30 00:00:00'
        ]);
    }
}

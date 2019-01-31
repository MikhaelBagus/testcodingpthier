<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ms_user')->insert([
            'role_id'          =>  1,
            'user_name'        =>  'adminbank',
            'user_full_name'   =>  'Admin Bank',
            'user_no_rekening' =>  '0000000000',
            'user_password'    =>  bcrypt('adminbank'),
            'user_saldo'       =>  0,
            'created_at'       =>  '2019-01-30 00:00:00'
        ]);
    }
}

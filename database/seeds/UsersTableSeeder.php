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
       
        DB::table('users')->insert(array(

           array(
               'id' => 1,     
               'email' => 'admin@admin.com',
               'password' => Hash::make('password')
              )
        ) );
    }
}

<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Sentinel::registerAndActivate(array(
		    'email'    => 'andre@galdino.com',
		    'password' => 'abc123*',
		));
    }
}

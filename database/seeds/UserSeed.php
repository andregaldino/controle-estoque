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
    	$admin = \Sentinel::registerAndActivate(array(
            'first_name' => 'John',
            'last_name' => 'Doe',
		    'email'    => 'admin@admin.com',
		    'password' => 'admin123',
		));

        //criando os grupos
        $adminRole = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => array('admin' => 1),
        ]);
        //adicionando o grupo admin ao user admin
        $admin->roles()->attach($adminRole);
    }
}

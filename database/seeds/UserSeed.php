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
            'first_name' => 'André',
            'last_name' => 'Galdino',
		    'email'    => 'andre@galdino.com',
		    'password' => 'abc123*',
		));

        //criando os grupos
        $adminRole = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => array('admin' => 1),
        ]);

        \Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'User',
            'slug'  => 'user',
        ]);
        //adicionando o grupo admin ao user admin
        $admin->roles()->attach($adminRole);
    }
}

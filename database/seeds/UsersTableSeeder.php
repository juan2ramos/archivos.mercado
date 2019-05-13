<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Client']);

        $SuperAdmin = User::create(
            [
                'name' => 'Juan Ramos',
                'email' => 'juan2ramos@gmail.com',
                'password' => bcrypt('123456'),
            ]
        );
        $SuperAdmin->assignRole('SuperAdmin');
    }
}

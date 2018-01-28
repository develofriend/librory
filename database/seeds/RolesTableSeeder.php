<?php

use Librory\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Librorian',
            'Member'
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
    }
}

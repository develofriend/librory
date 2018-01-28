<?php

use Librory\Models\User;
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
        $librorians = factory(User::class)->create([
            'email' => 'admin@librory.ee',
            'role_id' => 1
        ]);

        $members = factory(User::class, 10)->create([
            'role_id' => 2
        ]);
    }
}

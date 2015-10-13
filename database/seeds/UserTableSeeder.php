<?php

use Illuminate\Database\Seeder;
use TTBand\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew(['email' => 'chris.barranco@gmail.com']);
        $user->name = 'Chris';
        $user->password = bcrypt('elias626');
        $user->save();
    }
}

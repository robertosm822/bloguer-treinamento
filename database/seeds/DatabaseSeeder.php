<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory('App\User')->create(
            [
                'name'=> 'robertomelo',
                'email' => 'robertomelo822@gmail.com',
                'password' => bcrypt(123456)

            ]
        );

        $this->call(UserTableSeeder::class);
        $this->call('PostsSeeder');
        $this->call('TagTableSeeder');


        Model::reguard();
    }
}

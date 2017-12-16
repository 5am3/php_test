<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'username' => env('TEAM_NAME'),
                'email' => 'aklis@vidar.club',
                'password' => bcrypt(hash('sha256', 'ilovebirdway'))
            ],
            [
                'username' => 'Team16',
                'email' => 'birdway@vidar.club',
                'password' => bcrypt(hash('sha256', 'ilovebirdway'))
            ],
        ];

        DB::table('users')->insert($users);

    }
}

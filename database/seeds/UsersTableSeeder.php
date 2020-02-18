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
        $roles = DB::table('roles')->get();
        if (!empty($roles)){
            foreach ($roles as $key => $value) {
                    $data = [
                        [
                            'name' => 'superadmin',
                            'email' => 'thientrankhh@gmail.com',
                            'password' => '123456',
                            'role_id' => $value->id
                        ],
                        [
                            'name' => 'admin1',
                            'email' => 'thientrankhh@gmail.com',
                            'password' => '123456',
                            'role_id' => $value->id
                        ]
                    ];
                    DB::table('users')->insert($data);
            }
        }

    }
}

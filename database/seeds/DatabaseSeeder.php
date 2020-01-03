<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'พนักงาน',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'พนักงานรับ-ส่ง',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('status')->insert([
            'name' => 'Normal',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('status')->insert([
            'name' => 'VIP',
            'created_at' => now(),
            'updated_at' => now()
        ]);

//        DB::table('admin')->insert([
//            'username' => 'admin',
//            'password' => '123456',
//            'email' => 'admin01@gmail.com',
//            'first_name' => 'สมจิต',
//            'last_name' => 'เกือบรำ',
//            'gender' => 'ช',
//            'id_card' => '1311500045863',
//            'created_at' => now(),
//            'updated_at' => now()
//        ]);
    }
}

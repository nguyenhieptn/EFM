<?php
use \Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name' => 'Nguyen Hiep',
            'username' => 'admin',
            'email' => 'nguyenhieptn@yahoo.com',
            'password' => Hash::make('admin'),
        ));

    }
}
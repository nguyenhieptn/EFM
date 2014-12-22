<?php
use \Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('accounts')->delete();
        DB::table('accounts')->insert(
            array(
                array('name'=>'Tien Mat','user_id'=>'16'),
                array('name'=>'ACB','user_id'=>'16'),
                array('name'=>'VietInBank','user_id'=>'16'),
                array('name'=>'Paypal','user_id'=>'16'),
            )
        );
    }
}
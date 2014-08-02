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
                array('name'=>'Tien Mat'),
                array('name'=>'ACB'),
                array('name'=>'VietInBank'),
                array('name'=>'Paypal'),
            )
        );
    }
}
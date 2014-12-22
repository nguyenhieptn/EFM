<?php
use \Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert(
            array(
                array('name'=>'Ca Nhan','type'=>'1','user_id'=>'16'),
                array('name'=>'Vui Choi/Giai Tri','type'=>'1','user_id'=>'16'),
                array('name'=>'Mua Sam','type'=>'1','user_id'=>'16'),
                array('name'=>'Hieu Hy/Tham hoi','type'=>'1','user_id'=>'16'),
                array('name'=>'Luong','type'=>'0','user_id'=>'16'),
                array('name'=>'Thuong','type'=>'0','user_id'=>'16'),
                array('name'=>'Hoa Hong','type'=>'0','user_id'=>'16'),
            )
        );
    }
}
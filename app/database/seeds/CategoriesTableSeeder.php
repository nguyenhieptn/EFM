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
                array('name'=>'Ca Nhan'),
                array('name'=>'Vui Choi/Giai Tri'),
                array('name'=>'Mua Sam'),
                array('name'=>'Hieu Hy/Tham hoi'),
            )
        );
    }
}
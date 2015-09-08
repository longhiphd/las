<?php

use Illuminate\Database\Seeder;
use App\Models\RoleModule;
class RoleModuleTableSeeder extends Seeder
{
    public function run(){

        RoleModule::create([
            'name'=>'shop_manager',
            'role_id'=>2,
            'father_id'=>1
        ]);
        RoleModule::create([
            'name'=>'article_manager',
            'role_id'=>3,
            'father_id'=>2
        ]);
    }
}

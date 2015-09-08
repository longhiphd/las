<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    public function run(){

        Role::create([
            'name'=>'admin', 'permission'=>100
        ]);
        Role::create([
            'name'=>'shop_manager', 'permission'=>80
        ]);
        Role::create([
            'name'=>'article_manager', 'permission'=>60
        ]);
        Role::create([
            'name'=>'customer', 'permission'=>10
        ]);
    }
}

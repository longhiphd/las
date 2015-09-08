<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserRole;

class UserRoleTableSeeder extends Seeder
{
    public function run(){

        UserRole::create([
            'user_id'=>1,
            'role_id'=>1
        ]);
        UserRole::create([
            'user_id'=>2,
            'role_id'=>2
        ]);
        UserRole::create([
            'user_id'=>3,
            'role_id'=>3
        ]);
    }
}
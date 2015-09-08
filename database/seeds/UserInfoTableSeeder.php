<?php

use Illuminate\Database\Seeder;
use App\Models\UserInfo;

class UserInfoTableSeeder extends Seeder
{
    public function run(){
        UserInfo::truncate();

        UserInfo::create([
            'user_id'=>1
        ]);
    }
}
<?php

use Illuminate\Database\Seeder;
use App\Models\RoleModule;
use App\Models\ThemeOption;
class ThemeOptionsTableSeeder extends Seeder
{
    public function run(){

        ThemeOption::create([
           'logo'=>'logo.png',
            'website'=>'www.mir.vn',
            'email'=>'mirvietnam@gmail.com',
            'hotline'=>'1900 0000',
            'showroom'=>'P.2010, Tòa B, Chung Cư Cao Cấp Mulberry Lane Lê Văn Lương- Mỗ Lao - quận Hà Đông - Hà Nội',
            'social_fb'=>'facebook.com',
            'social_twitter'=>'twitter.com',
            'social_google_plus'=>'google.com',
            'social_pinterest'=>'pinterest.com',
        ]);
    }
}

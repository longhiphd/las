<?php

use Illuminate\Database\Seeder;
use App\Models\RoleModule;
use App\Models\CategoriesArticle;
class CategoryArticleTableSeeder extends Seeder
{
    public function run(){

        CategoriesArticle::create([
            'id'=>1,
            'module_id'=>2,
            'name'=>'Blog Nhà Đẹp',
            'slug'=>'blog-nha-dep'
        ]);
        CategoriesArticle::create([
            'id'=>2,
            'module_id'=>2,
            'name'=>'Tin Tức',
            'slug'=>'tin-tuc'
        ]);
        CategoriesArticle::create([
            'id'=>3,
            'module_id'=>2,
            'name'=>'Thiết Kế',
            'slug'=>'thiet-ke'
        ]);

    }
}

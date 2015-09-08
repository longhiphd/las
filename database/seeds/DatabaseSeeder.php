<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(UserInfoTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(RoleModuleTableSeeder::class);
        $this->call(CategoryArticleTableSeeder::class);
        $this->call(ThemeOptionsTableSeeder::class);

        Model::reguard();
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        $this->call(UsersTableSeeder::class);

        DB::table('categories')->truncate();
        $this->call(CategoriesTableSeeder::class);

        DB::table('tags')->truncate();
        $this->call(TagsTableSeeder::class);

        DB::table('posts')->truncate();
        $this->call(PostsTableSeeder::class);

        DB::table('post_tag')->truncate();
        $this->call(PostTagTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

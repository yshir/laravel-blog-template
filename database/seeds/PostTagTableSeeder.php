<?php

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 200; $i++) {
            DB::table('post_tag')->insert([
                'post_id' => random_int(1, 50),
                'tag_id' => random_int(1, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

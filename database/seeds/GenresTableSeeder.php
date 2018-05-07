<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['genre' => 'アーティスト'],
            ['genre' => 'アート'],
            ['genre' => '映画'],
            ['genre' => 'イラスト'],
            ['genre' => 'ゲーム'],
            ['genre' => '自然'],
            ['genre' => '動物'],
            ['genre' => 'その他']
        ]);
    }
}

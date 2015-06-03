<?php

class CommentTableSeeder extends Seeder {

    public function run(){
        DB::table('comments')->delete();

        Comment::create(array(
            'author' => 'John Lennon',
            'text'  => 'Come together'
            ));

        Comment::create(array(
            'author' => 'Paul McCartney',
            'text'  => 'Let it be'
            ));
    }
}

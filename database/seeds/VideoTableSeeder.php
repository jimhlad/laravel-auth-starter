<?php

use App\Video;
use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create(['title'=> 'A Simple Node.js API: Lesson #1', 'slug'=> 'a-simple-node-js-api-lession-1', 'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis dictum quam. Phasellus ante augue, sollicitudin ut pulvinar vitae, tristique ac velit. Duis sagittis tincidunt libero et euismod. Cras vel quam euismod, semper nulla nec, dignissim ex.', 'youtube_id'=> 'BxG9M0CC78s', 'is_approved'=> 1]);

        Video::create(['title'=> 'A Simple Node.js API: Lesson #2', 'slug'=> 'a-simple-node-js-api-lession-2', 'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis dictum quam. Phasellus ante augue, sollicitudin ut pulvinar vitae, tristique ac velit. Duis sagittis tincidunt libero et euismod. Cras vel quam euismod, semper nulla nec, dignissim ex.', 'youtube_id'=> 'zsY-6p7Ikjw', 'is_approved'=> 1]);

        Video::create(['title'=> 'A Simple Node.js API: Lesson #3', 'slug'=> 'a-simple-node-js-api-lession-3', 'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis dictum quam. Phasellus ante augue, sollicitudin ut pulvinar vitae, tristique ac velit. Duis sagittis tincidunt libero et euismod. Cras vel quam euismod, semper nulla nec, dignissim ex.', 'youtube_id'=> 'abhL_e9_rjE', 'is_approved'=> 1]);

        Video::create(['title'=> 'A Simple Node.js API: Lesson #4', 'slug'=> 'a-simple-node-js-api-lession-4', 'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis dictum quam. Phasellus ante augue, sollicitudin ut pulvinar vitae, tristique ac velit. Duis sagittis tincidunt libero et euismod. Cras vel quam euismod, semper nulla nec, dignissim ex.', 'youtube_id'=> 'odoFu4wSUJo', 'is_approved'=> 1]);
    }
}

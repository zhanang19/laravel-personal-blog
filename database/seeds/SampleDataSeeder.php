<?php

use App\User;
use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Zainal Hasan',
            'email' => 'zhanang19@gmail.com',
            'address' => 'Jember',
            'password' => \Hash::make('123123'),
            'is_admin' => true,
        ]);

        $category = Category::create([
            'slug' => 'internet',
            'name' => 'Internet',
        ]);

        $post = Post::create([
            'slug' => 'internet-of-things',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Internet of Things',
            'content' => 'Commodo laborum ipsum reprehenderit sint enim irure laborum nostrud veniam sunt dolor esse. In aute cupidatat nostrud mollit eu nostrud ad commodo consectetur irure. Et minim veniam sunt cillum sit aute pariatur nisi enim ut officia reprehenderit nisi cupidatat.',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 1',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 2',
        ]);
    }
}

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

        $post = Post::create([
            'slug' => 'internet-is-everything',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Internet is everything',
            'content' => 'Anim ut ut eu anim aute consequat consequat ad ut et proident labore. Ut commodo magna excepteur aliqua aliqua irure et culpa qui laborum. Velit duis pariatur ipsum aute sunt officia fugiat fugiat. Velit incididunt sunt exercitation id qui nisi culpa sint ut. Elit proident in exercitation consectetur cupidatat in nostrud dolore labore.',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 3',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 4',
        ]);

        $category = Category::create([
            'slug' => 'songs',
            'name' => 'Songs',
        ]);

        $post = Post::create([
            'slug' => 'all-of-me',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'All of me',
            'content' => 'Aliquip qui tempor velit irure. Tempor occaecat aliquip aute adipisicing culpa enim voluptate. Sit elit ad et ullamco consectetur. Aliqua duis incididunt nulla magna esse.',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 5',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 6',
        ]);

        $post = Post::create([
            'slug' => 'everything',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Everything',
            'content' => 'Ad deserunt veniam occaecat ullamco. Cillum proident veniam Lorem aute esse minim quis mollit proident. Laboris ad laborum do sint cupidatat. Adipisicing culpa duis irure duis. Culpa amet enim tempor mollit laborum veniam eu culpa exercitation exercitation voluptate veniam. Labore mollit tempor adipisicing sunt excepteur occaecat culpa cupidatat Lorem cupidatat enim sunt pariatur cupidatat. Eu aliquip id tempor nisi exercitation ex enim incididunt tempor mollit enim duis ullamco deserunt.',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 7',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 8',
        ]);

        $category = Category::create([
            'slug' => 'technology',
            'name' => 'Technology',
        ]);

        $post = Post::create([
            'slug' => 'day-tech',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Day Tech',
            'content' => 'Voluptate non pariatur voluptate exercitation fugiat voluptate duis anim Lorem anim duis quis sit culpa. Quis sunt id nostrud et quis ullamco mollit veniam esse in ipsum sit. Nostrud adipisicing minim ea adipisicing esse exercitation non sit in. Consequat reprehenderit in tempor adipisicing ex adipisicing ea. Irure ut aliqua est duis aute aute tempor duis cupidatat. Aliqua dolor proident veniam Lorem nisi magna ullamco reprehenderit minim in elit labore excepteur. Consequat qui nisi veniam quis anim reprehenderit cupidatat adipisicing nulla laboris.',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 9',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 10',
        ]);

        $post = Post::create([
            'slug' => 'my-laptop-story',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'My Laptop Story',
            'content' => 'Exercitation irure cupidatat non et. Excepteur cupidatat velit aliquip fugiat aliqua nulla excepteur sunt et. Irure id occaecat ad fugiat esse veniam.',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 11',
        ]);

        Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'content' => 'Komentar 12',
        ]);
    }
}

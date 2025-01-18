<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Hp;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {

    //     // \App\Models\User::factory()->create([
    //     //     'name' => 'Test User',
    //     //     'email' => 'test@example.com',
    //     // ]);
    // }

    public function run()
    {

        

        User::create([
            'name' => 'Adi Ramadhan',
            'username' => 'adi ramadhan',
            'email' => 'adirmdhn111006@gmail.com',
            'password'=> bcrypt('12345')
        ]);
        // User::create([
        //     'name' => 'Dodit Muhammad',
        //     'email' => 'dodit@gmail.com',
        //     'password'=> bcrypt('123456')
        // ]);
        Hp::factory(20)->create();

        User::factory(3)->create();

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eius iste pariatur asperiores placeat perferendis possimus, laborum officiis aut!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eius iste pariatur asperiores placeat perferendis possimus, laborum officiis aut! Optio, officiis? Repellat ullam, vel assumenda maxime nostrum praesentium provident, quod nemo tenetur necessitatibus mollitia molestiae blanditiis deserunt sunt odio veniam enim voluptatum fugiat tempore commodi facilis dignissimos porro sint minus! Tempora ipsum voluptatem quo, minus impedit adipisci molestiae modi recusandae!',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eius iste pariatur asperiores placeat perferendis possimus, laborum officiis aut!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eius iste pariatur asperiores placeat perferendis possimus, laborum officiis aut! Optio, officiis? Repellat ullam, vel assumenda maxime nostrum praesentium provident, quod nemo tenetur necessitatibus mollitia molestiae blanditiis deserunt sunt odio veniam enim voluptatum fugiat tempore commodi facilis dignissimos porro sint minus! Tempora ipsum voluptatem quo, minus impedit adipisci molestiae modi recusandae!',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eius iste pariatur asperiores placeat perferendis possimus, laborum officiis aut!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eius iste pariatur asperiores placeat perferendis possimus, laborum officiis aut! Optio, officiis? Repellat ullam, vel assumenda maxime nostrum praesentium provident, quod nemo tenetur necessitatibus mollitia molestiae blanditiis deserunt sunt odio veniam enim voluptatum fugiat tempore commodi facilis dignissimos porro sint minus! Tempora ipsum voluptatem quo, minus impedit adipisci molestiae modi recusandae!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eius iste pariatur asperiores placeat perferendis possimus, laborum officiis aut!',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eius iste pariatur asperiores placeat perferendis possimus, laborum officiis aut! Optio, officiis? Repellat ullam, vel assumenda maxime nostrum praesentium provident, quod nemo tenetur necessitatibus mollitia molestiae blanditiis deserunt sunt odio veniam enim voluptatum fugiat tempore commodi facilis dignissimos porro sint minus! Tempora ipsum voluptatem quo, minus impedit adipisci molestiae modi recusandae!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
    }
}

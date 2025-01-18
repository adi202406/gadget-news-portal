<?php

namespace App\Models;



class Post 
{
    private static $blog_posts =[
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "penulis" => "Adi Ramadhan",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti, sequi. Quis perferendis dolore quia id totam vero accusamus voluptatibus sapiente delectus non obcaecati rem odio, dolorem ab, illo optio! Eaque amet dolorem, debitis soluta blanditiis unde odit quos. Cum quibusdam, itaque dicta quisquam libero consectetur at ex porro. Reprehenderit a explicabo pariatur aliquid quibusdam consectetur? Quas adipisci quaerat recusandae. Deserunt, est earum? Possimus ullam beatae asperiores quis sunt voluptas, quidem voluptates reprehenderit praesentium reiciendis corporis et amet, dolorum nam, impedit exercitationem vitae accusamus! Sed hic corrupti similique consectetur minus repellat ipsam doloribus maxime quidem, nam blanditiis corporis vero accusamus quibusdam."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "penulis" => "Amin",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti, sequi. Quis perferendis dolore quia id totam vero accusamus voluptatibus sapiente delectus non obcaecati rem odio, dolorem ab, illo optio! Eaque amet dolorem, debitis soluta blanditiis unde odit quos. Cum quibusdam, itaque dicta quisquam libero consectetur at ex porro. Reprehenderit a explicabo pariatur aliquid quibusdam consectetur? Quas adipisci quaerat recusandae. Deserunt, est earum? Possimus ullam beatae asperiores quis sunt voluptas, quidem voluptates reprehenderit praesentium reiciendis corporis et amet, dolorum nam, impedit exercitationem vitae accusamus! Sed hic corrupti similique consectetur minus repellat ipsam doloribus maxime quidem, nam blanditiis corporis vero accusamus quibusdam."
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }

    

   
}

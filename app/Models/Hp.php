<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;


class Hp extends Model
{
    use HasFactory,Sluggable;

    
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        // Ambil input pencarian dari filters
        $search = $filters['search'] ?? ''; // Kata kunci pencarian asli
        $cleanedSearch = preg_replace('/[^\d]/', '', $search); // Hanya angka

        // Pencarian berdasarkan harga (menggunakan angka yang telah dibersihkan)
        // $query->when($cleanedSearch, function ($query) use ($cleanedSearch) {
        //     return $query->where('harga', 'like', '%' . $cleanedSearch . '%');
        // });

        // Pencarian berdasarkan judul (menggunakan teks asli)
        $query->when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('harga', 'like', '%' . $search . '%');;
        });




        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     return $query->whereHas('category', function($query) use($category) {
        //         $query-> where('slug', $category);
        //     });
        // });

        // $query->when($filters['author'] ?? false, fn($query, $author) 
        // => $query->whereHas('author', fn($query) 
        // => $query->where('username' , $author)
        //     )
        // );
    }

    public function category()
    {
        return $this -> belongsTo(Category::class);
    }

    public function author()
    {
        return $this -> belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

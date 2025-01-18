<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    public static function boot() {
        parent::boot();

        // Hapus balasan yang terkait ketika komentar dihapus
        static::deleting(function($comment) {
            $comment->replies()->delete();
        });
    }
}

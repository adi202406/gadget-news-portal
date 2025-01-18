<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class Comments extends Component
{
    public $post;
    public $newComment;
    public $replyCommentId;

    protected $rules = [
        'newComment' => 'required|string|max:255',
    ];

    public function mount($postId)
    {
        $this->post = Post::find($postId);
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->post->comments()->with('user')->get(),
        ]);
    }

    public function addComment()
    {
        $this->validate();

        $this->post->comments()->create([
            'content' => $this->newComment,
            'user_id' => auth()->id(),
        ]);

        $this->newComment = '';
    }

    public function replyComment($commentId)
    {
        $this->replyCommentId = $commentId;
    }

    public function likeComment($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->likes_count++;
        $comment->save();
    }
}


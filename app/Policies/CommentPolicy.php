<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy {
    use HandlesAuthorization;

    public function create(User $user, Post $post) {

        return $post->comments()
            ->where('user_id', $user->id)
            ->doesntExist();

    }

    public function delete(User $user, Comment $comment) {

        if ($comment->created_at->diffInMinutes(now()) >= 5)
            return false;

        return $comment->user_id == $user->id;
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller {

    public function store(CommentFormRequest $request, Post $post) {
        $this->authorize('create', [Comment::class, $post]);

        $data = $request->validated();

        $comment = new Comment($data);
        $comment->user()->associate(auth()->user());
        $comment->post()->associate($post);
        $comment->save();

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Comment $comment) {
        $this->authorize('delete', $comment);

        $post = $comment->post_id;
        $comment->delete();

        return redirect()->route('posts.show', $post);
    }

}

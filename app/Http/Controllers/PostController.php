<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller {

    public function index() {

        $posts = Post::query()
            ->latest()
            ->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create() {
        $this->authorize('create', Post::class);

        return view('posts.form');
    }

    public function store(PostFormRequest $request) {
        $this->authorize('create', Post::class);

        $data = $request->validated();

        /** @var User $user */
        $user = auth()->user();

        /** @var Post $post */
        $post = $user->posts()
            ->create($data);

        $this->uploadImage($request, $post);

        return redirect()->route('posts.show', $post);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments()->latest()->get()
        ]);
    }

    public function edit(Post $post) {
        $this->authorize('update', $post);

        return view('posts.form', [
            'post' => $post
        ]);
    }

    public function update(PostFormRequest $request, Post $post) {
        $this->authorize('update', $post);
        $data = $request->validated();

        $post->update($data);
        $this->uploadImage($request, $post);

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->deleteImage();
        $post->delete();
        return redirect()->route('posts.index');
    }

    protected function uploadImage(PostFormRequest $request, Post $post) {

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');

            $post->deleteImage();

            $post->update([
                'image_path' => $path
            ]);

        }

    }

}

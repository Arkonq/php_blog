<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function toggle(Post $post){
        $favorites = $post->favorites();
//        $exists = $favorites->where('user_id', auth()->id())->exists();
        $exists = auth()->user()->isFavorite($post);

        if ($exists){
            $favorites->detach(auth()->id());
        } else{
            $favorites->attach(auth()->id());
        }

        return [
            'favorite' => !$exists
        ];
    }

    function index(){

        $posts = auth()->user()
            ->favorites()
            ->latest()
            ->paginate(10);

        return view('posts.favorites', [
            'posts' => $posts
        ]);
    }
}

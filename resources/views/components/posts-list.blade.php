@if($posts->isEmpty())
    <p>
        Никаких постов нет!
    </p>
@else

    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }}

@endif

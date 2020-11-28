@extends('layouts.main')
{{--Вывод всех записей постов--}}

@section('content')
    <h1>Посты</h1>

    @can('create', 'App\Models\Post')
    <p>
        <a href="{{ route('posts.create') }}">Новый пост</a>
    </p>
    @endcan

    @include('components.posts-list')

@endsection

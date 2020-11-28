<?php
$post = $post ?? null;
?>
@extends('layouts.main')

@section('content')
    <h1>{{ $post ? 'Изменить пост' : 'Новый пост' }}</h1>

    @include('components.form-errors')

    <form enctype="multipart/form-data" action="{{ $post ? route('posts.update', $post) : route('posts.store') }}" method="post">
        @csrf

        @if($post)
            @method('put')
        @endif

        <div>
            <label for="image">Изображение</label>
        </div>

        <div>
            <input type="file" name="image" id="image" accept="image/*" />
        </div>

        <div>
            <label for="title">Название</label>
        </div>
        <div>
            <input value="{{ old('title', $post->title ?? null) }}"
                   type="text"
                   id="title"
                   name="title"
                   placeholder="Введите заголовок...">
        </div>

        <div>
            <label for="content">Пост</label>
        </div>
        <div>
            <textarea name="content"
                      id="content"
                      cols="30" rows="5"
                      placeholder="Напишите что-нибудь великое..."
            >{{ old('content', $post->content ?? null) }}</textarea>
        </div>

        <button>Сохранить</button>

    </form>

@endsection

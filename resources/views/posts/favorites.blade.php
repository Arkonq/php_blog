@extends('layouts.main')
{{--Вывод всех записей постов--}}

@section('content')
    <h1>Избранное</h1>

    @include('components.posts-list')

@endsection

@extends('layouts.main')

@section('content')

    <h1>Вход</h1>

    @include('components.form-errors')

    <form method="post" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email</label>
            <input value="{{ old('email') }}" type="email" id="email" name="email" placeholder="someone@example.com">
        </div>

        <div>
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label>
                <input {{ old('remember') ? 'checked' : '' }} type="checkbox" name="remember" value="1">
                Запомнить меня
            </label>
        </div>

        <button>Войти</button>

    </form>

@endsection

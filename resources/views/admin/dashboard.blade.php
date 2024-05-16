@extends('layouts.base')

@section('content')
    <div class="container">
        <h1>Панель керування адміністратора</h1>
        <p>Ласкаво просимо до панелі керування адміністратора!</p>
        <div>
            <a href="{{ route('admin.users') }}">
                {{ __('Керування користувачами') }}
            </a>
        </div>
        <div>
            <a href="{{ route('admin.roles') }}">
                {{ __('Керування ролями') }}
            </a>
        </div>
    </div>
@endsection

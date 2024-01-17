@extends('layouts.main')

@section('page.title', 'Створити пост')


@section('main.content')
    <x-title>
        {{ __('Створити пост') }}

        <x-slot name="link">
            <a href="{{ route('user.posts') }}">
                {{ __('Назад') }}
            </a>
        </x-slot>
    </x-title>

    <x-post.form action="{{ route('user.posts.store') }}" method="post">
        <x-button type="submit">
            {{ __('Створити пост') }}
        </x-button>
    </x-post.form>
@endsection
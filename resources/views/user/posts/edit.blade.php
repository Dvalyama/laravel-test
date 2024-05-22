@extends('layouts.main')

@section('page.title','Змінити пост')

@section('main.content')
    <x-title>
        {{__('Змінити пост')}}

        <x-slot name="link">
            <a href="{{route('user.posts.show', $post->id)}}">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-title>

    <x-post.form action="{{ route('user.posts.update', $post->id) }}" method="put" :post="$post">
    <x-slot name="initialText">
        {{ $post->content }}
    </x-slot>

    <x-slot name="postTitle">
        {{ $post->title }}
    </x-slot>

    <x-button type="submit">
        {{ __('Зберегти') }}
    </x-button>
    </x-post.form>




@endsection
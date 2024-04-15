@extends('layouts.main')

@section('page.title', __('Перегляд'))

@section('main.content')
    <x-title>
        {{ __('Перегляд поста') }}

        <x-slot name="link">
            <a href="{{ route('user.posts') }}">
                {{ __('Назад') }}
            </a>
        </x-slot>

        <x-slot name="right">
            <x-button-link @class('btn btn-primary btn-smr') href="{{ route('user.posts.edit', $post->id) }}">
                {{ __('Редагувати') }}
            </x-button-link>
            <form action="{{ route('user.posts.delete', $post->id) }}" method="POST" class="mr-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('Видалити') }}</button>
            </form>
        </x-slot>
    </x-title>


    <h2 class="h4">
        {{ $post->title }}
    </h2>

    <div class="smal text-muted">
        {{ now()->format('d.m.Y H:i:s') }}
    </div>

    <div class="pt-3">
        {!! $post->content !!}
    </div>
@endsection

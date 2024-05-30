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
            <div class="d-flex justify-content-between">
                <x-button-link @class('btn btn-primary btn-sm mr-4') href="{{ route('user.posts.edit', $post->id) }}">
                    {{ __('Редагувати') }}
                </x-button-link>
                <form action="{{ route('user.posts.delete', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">{{ __('Видалити') }}</button>
                </form>
            </div>
        </x-slot>
    </x-title>

    <h2 class="h4">
        {{ $post->title }}
    </h2>

    <div class="small text-muted">
        {{ $post->created_at->format('d.m.Y H:i:s') }}
    </div>

    <div class="pt-3">
        {!! $post->content !!}
    </div>
@endsection

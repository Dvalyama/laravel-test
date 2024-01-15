@extends('layouts.main')

@section('page.title', 'Мої посты')

@section('main.content')
    <x-title>
        {{ __('Мої посты') }}

        <x-slot name="right">
            <x-button-link href="{{ route('user.posts.create') }}">
                {{ __('Створити') }}
            </x-button-link>
        </x-slot>
        
    </x-title>

    @if(empty($posts))
        {{ __('Немає жодного посту.') }}
    @else
        @foreach($posts as $post)
            <div class="mb-3">
                <h2 class="h6">
                    <a href="{{ route('user.posts.show', $post->id) }}">
                        {{ $post->title }}
                    </a>
                </h2>

                <div class="small text-muted">
                    {{ $post->published_at?->format('d.m.Y H:i:s') }}
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    @endif
@endsection
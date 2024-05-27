@extends('layouts.main')

@section('page.title', $post->title)

@section('main.content')
    <x-title>
        {{ $post->title }}

        <x-slot name="link">
            <a href="{{ route('blog') }}">
                {{ __('Назад') }}
            </a>
        </x-slot>
    </x-title>

    <div class="post-content">
        {!! $post->content !!}
    </div>

    {{-- Форма для додавання коментаря --}}
    @auth
        @can('publish comments')
            <form action="{{ route('user.comment.create') }}" method="POST" class="mt-4">
                @csrf
                <textarea name="text" class="form-control" id="text" rows="3" required></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Додати коментар') }}</button>
                </div>
            </form>
        @endcan
    @endauth

    <ul class="list-unstyled mt-4">
        @foreach($comments as $comment)
            <li id="li-comment-{{$comment->id}}" class="comment mb-3 p-3 border rounded">
                <div id="comment-{{$comment->id}}" class="comment-container">
                    <div class="comment-author vcard mb-2">
                        <strong>{{ $comment->user->name }}</strong> {{-- Ім'я користувача --}}
                        <span class="comment-date text-muted ml-2">
                            {{ $comment->created_at->format('d.m.Y H:i') }} {{-- Дата та час створення --}}
                        </span>
                    </div>
                    <div class="comment-body mb-2">
                        <p>{{ $comment->text }}</p>
                    </div>
                    {{-- Форма для видалення коментаря --}}
                    <div class="d-flex justify-content-end">
                        @auth
                            @if(Auth::user()->id === $comment->user_id || Auth::user()->can('delete comments'))
                                <form action="{{ route('user.comment.delete', ['id' => $comment->id]) }}" method="POST" onsubmit="return confirm('Ви впевнені, що хочете видалити коментар?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('Видалити') }}</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

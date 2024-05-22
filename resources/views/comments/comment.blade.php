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

    {!! $post->content !!}

    {{-- Форма для додавання коментаря --}}
    @auth
        @can('publish comments')
            <form action="{{ route('user.comment.create') }}" method="POST">
                @csrf
                <textarea name="text" class="form-control" id="text" rows="3" required></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">Додати коментар</button>
                </div>
            </form>
        @endcan
    @endauth

    <ul>
        @foreach($comments as $comment)
            <li id="li-comment-{{$comment->id}}" class="comment">
                <div id="comment-{{$comment->id}}" class="comment-container">
                    <div class="comment-author vcard">
                        <strong>{{ $comment->user->name }}</strong> {{-- Ім'я користувача --}}
                        <span class="comment-date">
                            {{ $comment->created_at->format('d.m.Y H:i') }} {{-- Дата та час створення --}}
                        </span>
                    </div>
                    <div class="comment-meta commentmetadata">
                        {{-- Інші мета-дані коментаря --}}
                    </div>
                    <div class="comment-body">
                        <p>{{ $comment->text }}</p>
                    </div>
                    {{-- Форма для видалення коментаря --}}
                    <div class="reply group">
                        @auth
                            @if(Auth::user()->id === $comment->user_id || Auth::user()->can('delete comments'))
                                <form action="{{ route('user.comment.delete', ['id' => $comment->id]) }}" method="POST" onsubmit="return confirm('Ви впевнені, що хочете видалити коментар?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Видалити</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

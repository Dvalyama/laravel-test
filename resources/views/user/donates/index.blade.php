@extends('layouts.main')

@section('page.title', 'Мої донаты')

@section('main.content')
    <x-title>
        {{ __('Мої донаты') }}
    </x-title>

    @include('user.donates.stats')

@endsection
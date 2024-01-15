@extends('layouts.main')

@section('page.title', 'Мої донати')

@section('main.content')
    <x-title>
        {{ __('Мої донати') }}
    </x-title>

    @include('user.donates.stats')

@endsection
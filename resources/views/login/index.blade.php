@extends('layouts.auth')

@section('page.title', 'Сторінка входу')

@section('auth.content')
    <x-login.card/>

    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
@endsection



@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Редагування користувача</h1>

        <form action="{{ route('user.update', $user->id) }}" method="POST" class="border p-4 rounded">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Ім'я:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Пошта:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" class="form-control">
                <small class="form-text text-muted">Залиште порожнім, якщо не хочете змінювати пароль</small>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Підтвердження паролю:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <label>Ролі:</label><br>
                @foreach($roles as $role)
                    <div class="form-check">
                        <input type="checkbox" id="role{{ $role->id }}" name="roles[]" value="{{ $role->id }}" class="form-check-input" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                        <label for="role{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Зберегти</button>
                <a href="{{ route('admin.users') }}" class="btn btn-secondary">Назад</a>
            </div>
        </form>
    </div>
@endsection

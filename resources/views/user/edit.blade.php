<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагування користувача</title>
</head>
<body>
    <h1>Редагування користувача</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Ім'я:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}"><br>

        <label for="email">Пошта:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}"><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password"><br>

        <label>Ролі:</label><br>
        @foreach($roles as $role)
            <input type="checkbox" id="role{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
            <label for="role{{ $role->id }}">{{ $role->name }}</label><br>
        @endforeach

        <button type="submit">Зберегти</button>
    </form>
</body>
</html>

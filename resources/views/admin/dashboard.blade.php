<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель керування адміністратора</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('home') }}" class="back-btn">На головну</a>
        <h1>Панель керування адміністратора</h1>
        <p>Ласкаво просимо до панелі керування адміністратора!</p>
        <div>
            <a href="{{ route('admin.users') }}">
                {{ __('Керування користувачами') }}
            </a>
        </div>
        <div>
            <a href="{{ route('admin.roles') }}">
                {{ __('Керування ролями') }}
            </a>
        </div>

    </div>
</body>
</html>

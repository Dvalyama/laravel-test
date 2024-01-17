<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ active_link('home') }}" aria-current="page">
                        {{ __('Головна') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('blog') }}" class="nav-link {{ active_link('blog*') }}" aria-current="page">
                        {{ __('Блог') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                @auth
                    {{-- Показувати ім'я користувача та кнопку вихід для аутентифікованих користувачів --}}
                    <li class="nav-item">
                        <span class="nav-link">{{ auth()->user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">{{ __('Вийти') }}</button>
                        </form>
                    </li>
                @else
                    {{-- Показувати кнопку входу для неаутентифікованих користувачів --}}
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{ active_link('login') }}" aria-current="page">
                            {{ __('Вхід') }}
                        </a>
                    </li>

                    {{-- Показувати кнопку реєстрації для неаутентифікованих користувачів --}}
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link {{ active_link('register') }}" aria-current="page">
                            {{ __('Реєстрація') }}
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

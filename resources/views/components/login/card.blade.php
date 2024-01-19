<x-card>
    <x-card-header>
        <x-card-title>
            {{__('Вхід')}}
        </x-card-title>

        <x-slot name="right">
            <a href="{{route('register')}}">
                {{_('Реєстрація')}}
            </a>
        </x-slot>
    </x-card-header>

    <x-card-body>
        <x-form action="{{ route('login.store') }}" method="POST">
            <x-form-item>
                <x-label required>{{__('Email')}}</x-label>
                <x-input type="email" name="email" avtofocus/>
            </x-form-item>
        
            <x-form-item>
                <x-label required>{{__('Пароль')}}</x-label>
                <x-input type="password" name="password"/>
                
            </x-form-item>

            <x-form-item>
                <x-checkbox name="remember">
                    {{__("Запам'ятати мене")}}
                </x-checkbox>
            </x-form-item>

            <x-button type="submit" size="sm">
                {{__('Увійти')}}
            </x-button>         
        </x-form>        
    </x-card-body>

</x-card>
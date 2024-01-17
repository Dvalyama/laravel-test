@props(['post'=>null])



<x-form {{$attributes}}>
    <x-form-item>
<<<<<<< HEAD
        <x-label required>{{__('Назва поста')}}</x-label>
=======
        <x-label required>{{__('Назва посту')}}</x-label>
>>>>>>> ff869899168b227a7dcede0cc6075d96213f8d28
        <x-input name="title" autofocus/>
        <x-error name="title"/>
    </x-form-item>



    <x-form-item>
<<<<<<< HEAD
        <x-label required>{{__('Зміст поста')}}</x-label>
=======
        <x-label required>{{__('Зміст посту')}}</x-label>
>>>>>>> ff869899168b227a7dcede0cc6075d96213f8d28
        <x-trix name="content" value="{{$post->content ?? ''}}" />
        <x-error name="content"/>
    </x-form-item>

    <x-form-item>
<<<<<<< HEAD
        <x-label required>{{__('Дата публикації')}}</x-label>
=======
        <x-label required>{{__('Дата публікації')}}</x-label>
>>>>>>> ff869899168b227a7dcede0cc6075d96213f8d28
        <x-input name="published_at" placeholder="dd.mm.yyyy"/>
        <x-error name="published_at"/>
    </x-form-item>

    <x-form-item>
        <x-checkbox name="published">
            Опубліковано
        </x-checkbox>
    </x-form-item>



    {{$slot}}

    
</x-form>

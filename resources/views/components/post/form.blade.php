@props(['post'=>null])



<x-form {{$attributes}}>
    <x-form-item>
        <x-label required>{{__('Назва поста')}}</x-label>
        <x-input name="title" autofocus/>
        <x-error name="title"/>
    </x-form-item>



    <x-form-item>
        <x-label required>{{__('Зміст поста')}}</x-label>
        <x-trix name="content" value="{{$post->content ?? ''}}" />
        <x-error name="content"/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{__('Дата публікації')}}</x-label>
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

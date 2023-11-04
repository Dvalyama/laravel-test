<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return'Страница список постов';
    }    

    public function create()
    {
        return'Страница создание постов';
    }    

    public function store()
    {
        return'Запрос создание поста';
    }    

    public function show()
    {
        return'Страница просмотра поста';
    }    

    public function edit()
    {
        return'Страница изменеия поста';
    }    

    public function update()
    {
        return'Запрос изменения поста';
    }    

    public function delete()
    {
        return'Запрос удаления поста';
    }    

    public function like()
    {
        return'Лайк + 1';
    }    
}

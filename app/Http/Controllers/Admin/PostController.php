<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return'Сторінка список постів';
    }    

    public function create()
    {
        return'Сторінка створення постів';
    }    

    public function store()
    {
        return'Запит на створення посту';
    }    

    public function show()
    {
        return'Сторінка перегляду посту';
    }    

    public function edit()
    {
        return'Сторінка зміни посту';
    }    

    public function update()
    {
        return'Запит зміни посту';
    }    

    public function delete()
    {
        return'Запит видалення посту';
    }    

    public function like()
    {
        return'Лайк + 1';
    }    
}

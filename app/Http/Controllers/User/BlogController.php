<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        return 'Посты в блоге';
    }

    public function show($post)
    {
        return 'Один пост в блоге';
    }

    public function like($post)
    {
        return 'Поставить лайк';
    }
}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $post= (object) [
            'id'=>123,
            'title'=>'Lorem ipsum dolor sit amet.',
            'content'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, corporis.',
        ];

        $posts = array_fill(0,10,$post);
        
        return view ('blog.index', compact('posts'));
    }

    public function show($post)
    {
        $post= (object) [
            'id'=>123,
            'title'=>'Lorem ipsum dolor sit amet.',
            'content'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, corporis.',
        ];
        return view ('blog.show',compact('post'));
    }

    public function like($post)
    {
        return 'Поставить лайк';
    }
}

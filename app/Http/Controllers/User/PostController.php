<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;


use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $post= (object) [
            'id'=>123,
            'title'=>'Lorem ipsum dolor sit amet.',
            'content'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, corporis.',
        ];

        $posts = array_fill(0,10,$post);
        return view('user.posts.index',compact('posts'));
    }    

    public function create()
    {
        return view('user.posts.create');
    }    

    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();
        
        // $validated = $request->validate([
        //     'title'=>['required','string','max:100'],
        //     'content'=>['required','string','max:1000'],
        // ]);
        
        // $validated = validator($request->all(),[
        //     'title'=>['required','string','max:100'],
        //     'content'=>['required','string','max:1000'],

        // ])->validate();

        dd($validated);
        
        alert(__('Сохранено'));
        return redirect()->route('user.posts.show',123);
    }    

    public function show($post)
    {
        $post= (object) [
            'id'=>123,
            'title'=>'Lorem ipsum dolor sit amet.',
            'content'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, corporis.',
        ];

        return view('user.posts.show',compact('post'));
    }    

    public function edit($post)
    {
        $post= (object) [
            'id'=>123,
            'title'=>'Lorem ipsum dolor sit amet.',
            'content'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est, corporis.',
        ];

        return view('user.posts.edit',compact('post'));
    }    

    public function update(Request $request,$post)
    {
        $title=$request->input('title');
        $content=$request->input('content');
        
        alert(__('Сохранено'));

        return redirect()->back();
    }    

    public function delete($post)
    {
        return redirect()->route('user.posts.');
    }    

    public function like()
    {
        return'Лайк + 1';
    }    
}

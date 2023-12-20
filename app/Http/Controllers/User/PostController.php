<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Validation\ValidationException;


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

    public function store(Request $request)
    {        
        $validated = validate($request->all(),[
            'title'=>['required','string','max:100'],
            'content'=>['required','string','max:1000'],
            'published_at'=>['nullable','string','date'],
            'published'=>['nullable','boolean'],
        ]);

        $post = Post::query()->firstOrCreate([
            'user_id'=>User::query()->value('id'),
            'title'=>$validated['title'],
        ],[
            'content'=>$validated['content'],
            'published_at'=> new Carbon($validated['published_at'])?? null,
            'published'=>$validated['published']?? false,
        ]);

        dd($post->toArray());
        
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
        $validated = validate($request->all(),[
            'title'=>['required','string','max:100'],
            'content'=>['required','string','max:1000'],

        ]);
        
        dd($validated);
        
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

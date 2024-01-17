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
        $posts=Post::query()->paginate(12);

        return view('user.posts.index',compact('posts'));
    }    

    public function create()
    {
        return view('user.posts.create');
    }    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:1000'],
            'published_at' => ['nullable', 'date'],
            'published' => ['nullable', 'boolean'],
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

<<<<<<< HEAD
        alert(__('Збережено'));
        return redirect()->route('user.posts.show',123);
    }    
=======
        $post = Post::updateOrCreate(
            [
                'user_id' => User::value('id'),
                'title' => $request->title,
            ],
            [
                'content' => $request->content,
                'published_at' => $request->has('published_at') ? new Carbon($request->published_at) : null,
                'published' => $request->boolean('published', false),
            ]
        );

        Alert::success(__('Збережено'));
        return redirect()->route('user.posts.show', ['post' => $post->id]);
    }   
>>>>>>> ff869899168b227a7dcede0cc6075d96213f8d28

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
        
        alert(__('Збережено'));

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

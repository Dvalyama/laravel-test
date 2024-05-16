<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $posts = $user->posts()
            ->latest('created_at')
            ->paginate(12);

        return view('user.posts.index', compact('posts'));
    }

     public function create()
    {
        // $this->authorize('create', Post::class);

        return view('user.posts.create');
    }

    public function store(Request $request)
    {
//        $this->authorize('create', Post::class);

        $validated = validate($request->all(), Post::$rules);

        $post = (new Post)->fillAttributes($validated);
        $post->user_id = Auth::id();
        $post->published_at = now();
        $post->save();

        alert(__('Збережено!'));

        return redirect()->route('user.posts.show', $post);
    }

    public function show(Post $post)
    {
        return view('user.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
//        $this->authorize('update', $post);

        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
//        $this->authorize('update', $post);

        $validated = validate($request->all(), Post::$rules);

        $post->fillAttributes($validated)->save();

        alert(__('Збережено!'));

        return back();
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('user.posts')->with('success', 'Пост був успішно видалений');
    }

}

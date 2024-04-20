<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'text' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);
    
        $data['user_id'] = auth()->id();
    
        $comment = Comment::create($data);
    
        if ($comment) {
            return Redirect::back()->with('success', 'Коментар успішно додано');
        }
    
        return Redirect::back()->with('error', 'Помилка при додаванні коментаря');
    }

    /**
     * Remove the specified comment from storage and redirect back.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            return redirect()->back()->with('success', 'Коментар успішно видалено');
        }
        return redirect()->back()->with('error', 'Помилка при видаленні коментаря');
    }

        public function showCommentsForPost($post_id)
    {
        // Отримуємо коментарі до конкретного поста
        $comments = Comment::where('post_id', $post_id)->get();

        // Повертаємо вид з коментарями для поста
        return view('post.comments', compact('comments', 'post_id'));
    }

    
}

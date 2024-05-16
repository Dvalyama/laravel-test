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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment();
        $comment->text = $validatedData['text'];
        $comment->post_id = $validatedData['post_id'];
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return Redirect::back()->with('success', 'Коментар успішно додано');
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
            return Redirect::back()->with('success', 'Коментар успішно видалено');
        } else {
            return Redirect::back()->with('error', 'Помилка при видаленні коментаря');
        }
    }
    public function showCommentsForPost($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->get();

        return view('post.comments', compact('comments', 'post_id'));
    }

    
}

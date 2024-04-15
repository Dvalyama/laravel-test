<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{


    /**
     * Обработка формы - AJAX
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $data = $request->except('_token', 'comment_post_ID', 'comment_parent');

        $data['post_id'] = $request->input('comment_post_ID');

        $data['user_id'] = Auth::id();


        $validator = Validator::make($data,[
            'post_id' => 'integer|required',
            'text' => 'required',
            'user_id' => 'integer|required',

        ]);

        unset($data['submit']);

        $comment = new Comment($data);
        $comment->save();


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }


        $data['id'] = $comment->id;
//        $data['hash'] = md5($user->email);


        $view_comment = view(env('THEME').'.comments.new_comment')->with('data', $data)->render();

        return response()->json(['success'=>true, 'comment'=>$view_comment, 'data'=>$data]);

    }
}

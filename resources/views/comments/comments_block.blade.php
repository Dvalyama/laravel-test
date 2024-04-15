{{--@php--}}

{{--    if($essence){--}}
{{--        $comments = $essence->comments;--}}

{{--        /*--}}
{{--         * Группируем комментарии по полю parent_id. При этом данное поле становится ключами массива--}}
{{--         * коллекций содержащих модели комментариев--}}
{{--         */--}}
{{--        $com = $comments->where('status', 1)->groupBy('parent_id');--}}
{{--    } else $com = null;--}}

{{--@endphp--}}


<div class="wrap_result"></div>


<div id="comments">
    <ol class="commentlist group">
        @if($comments)
            @include('comments.comment', ['items' => $comments])
        @endif
    </ol>



    <div id="respond">
        <h3 id="reply-title">Написати <span>комментарій</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Отменить ответ</a></small></h3>

        <form action="{{ route('user.comment')}}" method="post" id="commentform">
            <p class="comment-form-comment"><label for="comment">Ваш комментарій</label><textarea id="comment" name="text" cols="45" rows="8"></textarea></p>

            <input type="hidden" id="comment_post_ID" name="comment_post_ID" value="{{ $post->id}}">
            <input type="hidden" id="comment_parent" name="comment_parent" value="">

            {{ csrf_field()}}

            <div class="clear"></div>
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" value="Відправити" />
            </p>
        </form>
    </div>

</div>
</div>

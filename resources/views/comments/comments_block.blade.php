<div class="wrap_result"></div>


<div id="comments">
    <ol class="commentlist group">
        @if($comments)
            @include('comments.comment', ['items' => $comments])
        @endif
    </ol>



    <div id="respond">
        <h3 id="reply-title">Написать <span>комментарий</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Отменить ответ</a></small></h3>

            <form action="{{ route('user.comment.create')}}" method="post" id="commentform">
                <p class="comment-form-comment"><label for="comment">Ваш комментарій</label><textarea id="comment" name="text" cols="45" rows="8"></textarea></p>

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                {{ csrf_field()}}

                <div class="form-submit">
                        <input name="submit" type="submit" id="submit" value="Відправити" />
                </div>
    </form>

    </div>

</div>
</div>

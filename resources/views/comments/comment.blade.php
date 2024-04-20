@foreach($items as $item)
    <li id="li-comment-{{$item->id}}" class="comment">
        <div id="comment-{{$item->id}}" class="comment-container">
            <div class="comment-author vcard">
                {{-- Вміст коментаря --}}
            </div>
            <div class="comment-meta commentmetadata">
                {{-- Вміст коментаря --}}
            </div>
            <div class="comment-body">
                {{-- Вміст коментаря --}}
                <p>{{ $item->text }}</p>
            </div>
            {{-- Форма для видалення коментаря --}}
            <div class="reply group">
                @auth
                    @if(Auth::user()->id === $item->user_id)
                        <form action="{{ route('user.comment.delete', ['id' => $item->id]) }}" method="POST" onsubmit="return confirm('Ви впевнені, що хочете видалити коментар?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Видалити</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </li>
@endforeach

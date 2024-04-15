@foreach($items as $item)
    <li id="li-comment-{{$item->id}}" class="comment">
        <div id="comment-{{$item->id}}" class="comment-container">
            <div class="comment-author vcard">
                {{-- Вміст коментаря --}}
                {{-- Додайте дані коментаря --}}
            </div>
            <div class="comment-meta commentmetadata">
                {{-- Вміст коментаря --}}
                {{-- Додайте дані коментаря --}}
            </div>
            <div class="comment-body">
                {{-- Вміст коментаря --}}
                <p>{{ $item->text }}</p>
            </div>
            {{-- Додайте кнопку "Видалити" --}}
            <div class="reply group">
                <button class="delete-comment" data-id="{{$item->id}}">Видалити</button>
            </div>
        </div>
    </li>
@endforeach

<script>
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-comment')) {
            let commentId = event.target.getAttribute('data-id');
            deleteComment(commentId);
        }
    });

    function deleteComment(commentId) {
        fetch('/comment/' + commentId, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            let commentElement = document.getElementById('li-comment-' + commentId);
            commentElement.parentNode.removeChild(commentElement);
        })
        .catch(error => {
            console.error('There was an error!', error);
        });
    }
</script>

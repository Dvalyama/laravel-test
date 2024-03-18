<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Показує список коментарів.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Отримуємо всі коментарі з бази даних
        $comments = Comment::all();

        // Повертаємо вид зі списком коментарів і передаємо в нього змінну з коментарями
        return response()->view('comments.index', compact('comments'));
    }

    /**
     * Показує форму для створення нового коментаря.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Повертаємо вид з формою для створення коментаря
        return response()->view('comments.create');
    }

    /**
     * Зберігає новий коментар в базі даних.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Валідація даних з форми створення коментаря
        $request->validate([
            'content' => 'required|string|max:255',
            // додайте інші правила валідації за необхідності
        ]);

        // Створюємо новий об'єкт коментаря з введеними даними
        Comment::create($request->all());

        // Повертаємо користувача на сторінку зі списком коментарів з повідомленням про успішне створення коментаря
        return redirect()->route('comments.index')
            ->with('success', 'Comment created successfully.');
    }

    /**
     * Показує конкретний коментар.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Отримуємо коментар з бази даних за його ідентифікатором
        $comment = Comment::findOrFail($id);

        // Повертаємо вид з даними конкретного коментаря
        return view('comments.show', compact('comment'));
    }

    /**
     * Показує форму для редагування конкретного коментаря.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Отримуємо коментар з бази даних за його ідентифікатором
        $comment = Comment::findOrFail($id);

        // Повертаємо вид з формою для редагування коментаря та передаємо в нього дані коментаря
        return view('comments.edit', compact('comment'));
    }

    /**
     * Оновлює вказаний коментар в базі даних.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Валідація даних з форми редагування коментаря
        $request->validate([
            'content' => 'required|string|max:255',
            // додайте інші правила валідації за необхідності
        ]);

        // Отримуємо коментар з бази даних за його ідентифікатором
        $comment = Comment::findOrFail($id);

        // Оновлюємо дані коментаря з введеними даними
        $comment->update($request->all());

        // Повертаємо користувача на сторінку зі списком коментарів з повідомленням про успішне оновлення коментаря
        return redirect()->route('comments.index')
            ->with('success', 'Comment updated successfully');
    }

    /**
     * Видаляє вказаний коментар з бази даних.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Отримуємо коментар з бази даних за його ідентифікатором
        $comment = Comment::findOrFail($id);

        // Видаляємо коментар з бази даних
        $comment->delete();

        // Повертаємо користувача на сторінку зі списком коментарів з повідомленням про успішне видалення коментаря
        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully');
    }
}

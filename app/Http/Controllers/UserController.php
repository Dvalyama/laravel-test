<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit(User $user)
    {
        $roles = Role::all(); 

        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Валідація вхідних даних
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // Пароль не обов'язковий
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ]);

        // Оновлюємо дані користувача, крім паролю
        $user->update(array_filter($validatedData, function($key) {
            return $key !== 'password';
        }, ARRAY_FILTER_USE_KEY));

        // Оновлюємо пароль, якщо він вказаний
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
            $user->save();
        }

        // Синхронізація ролей
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users')->with('success', 'Користувача успішно оновлено');
    }
}

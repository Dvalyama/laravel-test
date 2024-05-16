<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        // Отримуємо всіх користувачів з бази даних
        $users = User::all();

        // Передаємо дані користувачів у представлення admin.users
        return view('admin.users', ['users' => $users]);
    }

    public function roles()
    {
        // Отримуємо всі ролі з бази даних
        $roles = Role::all();
         
        // Передаємо дані ролей у представлення admin.roles
        return view('admin.roles', ['roles' => $roles]);
    }
}


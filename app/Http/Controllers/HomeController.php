<?php

namespace App\Http\Controllers;

use App\Repository\TodoApiRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $todoRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->todoRepository = new TodoApiRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos = $this->todoRepository->getAllTodos();
        return view('home', compact('todos'));
    }

    /**
     * Show form to create todo
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createTodo()
    {
        return view('todos.create');
    }

    /**
     * Show form to edit todo
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editTodo($id)
    {
        return view('todos.edit', compact('id'));
    }
}

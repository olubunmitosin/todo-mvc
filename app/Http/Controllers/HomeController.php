<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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

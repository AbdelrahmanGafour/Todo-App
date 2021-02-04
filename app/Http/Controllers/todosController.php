<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class todosController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todos.todos',['todos'=> $todos]);
//        return view('todos')-> with('todos',$todos);
//        return view('todos',compact('todos'));
    }

    public function show(Todo $todo){
        return view('todos.show')->with('todo',$todo);
    }

    public function  create(){
        return view('todos.create');
    }

    public function store(Request $request){
//        return $request->all();
//        return $request->input();
//        return $request->todoTitle;

        // validation //
//         $request->validate([
//            'todoTitle' => 'required|min:3',
//            'todoDescription' => 'required',
//        ]);
        $this->validate($request,[
            'todoTitle' => 'required|min:3',
            'todoDescription' => 'required',
        ]);
///////////////////////////////////////////////////////
//            Create_Todo //
        $todo = new Todo();
        $todo->title = $request->todoTitle;
        $todo->description = $request->input('todoDescription');
        $todo->save();
        $request->session()->flash('success', 'Todo created successfully');
        return redirect('/todos');
    }

    public function edit(Todo $todo){
        return view('todos.edit')-> with('todo',$todo);
    }

    public function update(Request $request, Todo $todo){
        $this->validate($request,[
            'todoTitle' => 'required|min:3',
            'todoDescription' => 'required',
        ]);
        $todo->title = $request->get('todoTitle');
        $todo->description = $request->get('todoDescription');
        $todo->save();
        $request->session()->flash('success', 'Todo updated successfully');

        return redirect('/todos');
    }

    public function delete(Todo $todo){
        $todo->delete();
        session()->flash('success', 'Todo deleted successfully');
        return redirect('/todos');
    }

    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();
        session()->flash('success', 'Todo completed successfully');
        return redirect('/todos');
    }
}

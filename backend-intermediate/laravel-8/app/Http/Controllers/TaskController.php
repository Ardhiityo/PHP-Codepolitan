<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RequestValidation;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->query('search');
        $tasks = Task::paginate(3);
        if ($query) {
            $result = $tasks->toQuery()->where('task', 'like', "%$query%")->get();
            return response()->json($result);
        }
        return view('tasks.index', [
            "data" => $tasks
        ]);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function show($id)
    {
        $tasks = Task::find($id);
        if ($tasks) {
            return $tasks;
        }
        return 'not found';
    }

    public function store(RequestValidation $request)
    {
        Task::create($request->validated());
        return redirect('/tasks');
    }

    public function restore($id)
    {
        $task = Task::find($id);
        return view('/tasks/edit', ["task" => $task]);
    }

    public function update($id, RequestValidation $request)
    {
        $task = Task::find($id);

        if ($task) {
            $task->update($request->validated());
            return redirect('/tasks');
        }
    }

    public function delete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return redirect('/tasks');
        }
        return 'not found';
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        return redirect('/login');
    }
}

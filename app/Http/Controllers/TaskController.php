<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
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

    public function index()
    {
        $tasks = Auth::user()->tasks()->with('user')->paginate(10);

        // For JSON response
        if (request()->wantsJson()) {
            return TaskResource::collection($tasks);
        }

        // For Blade view
        //$tasksForView = TaskResource::collection($tasks);
        return view('tasks', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        //Not implemented with create request.Need more time
        $task = Auth::user()->tasks()->create($request);
        return new TaskResource($task);
    }

    //Rest of all other resource methods like show update delete etc..all need to to be implemented
}

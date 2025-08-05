<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    // 5.1 Listar tareas con sus keywords
    public function index()
    {
        $tasks = Task::with('keywords')->get();
        return response()->json($tasks, Response::HTTP_OK);
    }

    // 5.2 Crear nueva tarea y asignar keywords
    public function store(TaskRequest $request)
    {
        $task = Task::create([
            'title' => $request->title,
        ]);

        if ($request->filled('keyword_ids')) {
            $task->keywords()->attach($request->keyword_ids);
        }

        return response()->json($task->load('keywords'), Response::HTTP_CREATED);
    }

    // 5.3 Toggle estado is_done
    public function toggle($id)
    {
        $task = Task::findOrFail($id);
        $task->is_done = ! $task->is_done;
        $task->save();

        return response()->json($task, Response::HTTP_OK);
    }
}

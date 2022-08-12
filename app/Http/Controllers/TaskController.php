<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view("index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) {
        //
    }

    public function getTasks() {
        $tasks = DB::table('tasks')
            ->select("id", "task_name", "category")
            ->get();

        return $tasks;
    }

    public function saveTask($taskName, $category) {

        $task =    [
            "task_name" => $taskName,
            "category" => $category
        ];

        if (DB::table('tasks')->where('task_name', $taskName)->doesntExist()) {
            try {
                $id = DB::table('tasks')->insertGetId($task);

                $newTask = DB::table('tasks')
                    ->where('id', $id)
                    ->select("id", "task_name", "category")
                    ->get();

                return $newTask;
            } catch (\Exception $e) {
                Log::info("Exception found while inserting task, Exception object: ${e}");
            }
        } else {
            return "exists";
        }
    }

    public function updateCategory($taskId, $category) {

        $updatedTask = DB::table('tasks')
            ->where('id', $taskId)
            ->update([
                'category' => $category
            ]);

        if ($updatedTask) {
            $tasks = DB::table('tasks')
                ->select("id", "task_name", "category")
                ->get();

            return $tasks;
        }
    }
}

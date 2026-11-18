<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TasksController extends Controller
{

    public function list()
    {
        $tasks = Tasks::all();

        return View("task-list", ["tasks" => json_decode($tasks)]);
    }
    //
    public function insert()
    {
        $tasks = new Tasks();
        $tasks->project_id = 123;
        $tasks->name = "Task Name";
        $tasks->description = "Task Description";
        $tasks->status = "Completed";
        $tasks->priority = "High";
        $tasks->due_date = "2026-11-12";
        $tasks->assigned_to = 3;

        if ($tasks->save()) {
            return "Task inserted successfully";
        } else {
            return "Something went wrong";
        }
    }


    public function update($id)
    {
        $update = Tasks::findOrFail($id);
        $update->name = "Task New Name";
        $update->description = "Task New Description";

        if ($update->save()) {
            return "Task updated successfully:  $id";
        } else {
            return "Something went wrong";
        }
    }

    public function delete($id)
    {
        $delete = Tasks::findOrFail($id);

        if ($delete->delete()) {
            return "Task deleted successfully:  $id";
        } else {
            return "Something went wrong";
        }
    }
}

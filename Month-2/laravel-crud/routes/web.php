<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("tasks")->group(function () {

    Route::controller(TasksController::class)->group(function () {
        Route::get("/task-list", "list");
        
        Route::get("/add-task", "insert");

        Route::get("/update-task/{id}", "update");

        Route::get("/delete-task/{id}", "delete");
    });
});

<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::controller(EmployeeController::class)->group(function () {
    Route::get("/", "index")->name("employee.index");

    Route::get("/search", "searchEmp")->name("employee.search");
    Route::get("/filter", "filterEmp")->name("employee.filter");

    Route::get("/get-one-emp", "getOneEmp")->name("employee.getone");
    Route::post("/add-emp", "addEmp")->name("employee.add");
    Route::post("/update-emp/{id}", "updateEmp")->name("employee.update");
    Route::delete("/delete-emp/{id}", "deleteEmp")->name("employee.delete");
});

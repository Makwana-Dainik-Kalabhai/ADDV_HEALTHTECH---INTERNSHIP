<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    function index()
    {
        return View("index", ["employees" => Employees::all()]);
    }


    function searchEmp(Request $req)
    {
        $search = $req->search;
        $emp = Employees::where("employee_code", "$search")->orWhere("first_name", "like", "%$search%")->orWhere("last_name", "like", "%$search%")->orWhere("email", "like", "%$search%")->get();

        return response()->json($emp);
    }

    function filterEmp(Request $req)
    {
        $filterType = $req->filterType;
        $emp = [];

        if ($filterType == "salary-l-h") {
            $emp = Employees::orderBy("salary", "ASC")->get();
        } else if ($filterType == "salary-h-l") {
            $emp = Employees::orderBy("salary", "DESC")->get();
        } else if ($filterType == "hire-o-l") {
            $emp = Employees::orderBy("hire_date", "ASC")->get();
        } else if ($filterType == "hire-l-o") {
            $emp = Employees::orderBy("hire_date", "DESC")->get();
        } else {
            $emp = Employees::all();
        }
        if (sizeof($emp) > 0) {
            return response()->json([
                "status" => "success",
                "employees" => $emp,
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "Internal Server Error",
        ]);
    }

    function addEmp(Request $req)
    {
        $findEmp = Employees::where("email", $req->email)->orWhere("employee_code", $req->employee_code)->first();
        if ($findEmp) {
            $req->session()->flash("error", "Employee already exist");

            return redirect("/");
        }

        $emp  = Employees::create($req->all());
        if ($emp->save()) {
            $req->session()->flash("success", "Employee added successfully");
        } else {
            $req->session()->flash("error", "Internal Server Error");
        }
        return redirect("/");
    }

    function getOneEmp(Request $req)
    {
        $emp = Employees::where("id", $req->id)->first();

        return response()->json($emp);
    }

    function updateEmp(Request $req, int $id)
    {
        $update = Employees::findOrFail($id);
        $update->update($req->all());

        if ($update->save()) {
            $req->session()->flash("success", "Employee data updated successfully");
        } else {
            $req->session()->flash("error", "Internal Server Error");
        }
        return redirect("/");
    }

    function  deleteEmp(int $id)
    {
        $delete = Employees::where("id", $id)->first();

        if ($delete->delete()) {
            return response()->json([
                "status" => "success",
                "employees" => Employees::all(),
                "message" => "Employee deleted successfully"
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Internal Server Error"
            ]);
        }
    }
}

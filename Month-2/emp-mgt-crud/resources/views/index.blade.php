<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emp Mgt System</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">


<body class="px-5 py-10">
    @if(session("success"))
    <div class="alert theme-success" role="alert">
        <p>{{ session("success") }}</p>
    </div>
    @endif

    @if(session("error"))
    <div class="alert theme-danger" role="alert">
        <p>{{ session("error") }}</p>
    </div>
    @endif


    <h3 class="text-center mt-10">Employee Management System</h3>

    <div class="m-10">
        <div class="row my-10 text-end">
            <div class="col-3 d-flex p-0">
                <input type="text" class="form-control" name="search" placeholder="Search by code, name, email" />
            </div>
            <div class="col-9 d-flex p-0 justify-content-end align-items-center">
                <span>Sort By:</span>&emsp;
                <select name="sort" class="form-control w-fit">
                    <option value="all">All</option>
                    <option value="salary-l-h">Salary (Low to High)</option>
                    <option value="salary-h-l">Salary (High to Low)</option>
                    <option value="hire-o-l">Hire Date (Oldest to Latest)</option>
                    <option value="hire-l-o">Hire Date (Latest to Oldest)</option>
                </select>&emsp;

                <button type="button" class="btn-solid theme-danger fs-sm add-emp-btn" data-bs-toggle="dialog" data-bs-target="#addEmpDialog">
                    Add New Employee
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-3 px-3 py-4 bg-secondary border rounded-4">Emp</div>
            <div class="col-2 px-3 py-4 bg-secondary border rounded-4">Designation</div>
            <div class="col-2 px-3 py-4 bg-secondary border rounded-4">Department</div>
            <div class="col-1 px-3 py-4 bg-secondary border rounded-4">Salary</div>
            <div class="col-1 px-3 py-4 bg-secondary border rounded-4">Hire Date</div>
            <div class="col-1 px-3 py-4 bg-secondary border rounded-4">Emp Type</div>
            <div class="col-1 px-3 py-4 bg-secondary border rounded-4">Status</div>
            <div class="col-1 px-3 py-4 bg-secondary border rounded-4">Update / Delete</div>
        </div>


        <div class="employee-list">
            @foreach ($employees as $emp)

            <div class="row">
                <div class="col-3 p-3 border rounded-4 fs-sm"><span class="fw-semibold">{{ $emp["employee_code"] }}</span><br />{{ $emp["first_name"]." ".$emp["last_name"] }}<br />{{ $emp["email"] }}</div>
                <div class="col-2 p-3 border rounded-4">{{ $emp["designation"] }}</div>
                <div class="col-2 p-3 border rounded-4">{{ $emp["department"] }}</div>
                <div class="col-1 p-3 border rounded-4">{{ $emp["salary"] }}</div>
                <div class="col-1 p-3 border rounded-4">{{ $emp["hire_date"] }}</div>
                <div class="col-1 p-3 border rounded-4">{{ $emp["employment_type"] }}</div>

                <div class="col-1 p-3 border rounded-4">
                    <span class="px-3 py-1 rounded-3 fs-sm fw-semibold fg-white bg-{{ $emp["status"]=='Active'?'success':($emp["status"]=='Inactive'?'danger':'warning') }}">{{ $emp["status"] }}</span>
                </div>

                <div class="col-1 p-3 border rounded-4">
                    <button data-id="{{ $emp['id'] }}" type="button" class="btn-outline theme-inverse fs-sm update-emp-btn" data-bs-toggle="dialog" data-bs-target="#updateEmpDialog">
                        Update
                    </button>
                    <button data-id="{{ $emp['id'] }}" class="btn-solid theme-inverse mt-3 fs-sm delete-emp-btn">Delete</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    @include("add-emp-form")
    @include("update-emp-form")


    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>


    <script>
        window.searchEmp = "{{ route('employee.search') }}";
        window.getOneEmp = "{{ route('employee.getone') }}";
    </script>

    @vite([
    'resources/js/get-employees.js',
    'resources/js/filter-emp.js',
    'resources/js/update-emp.js',
    'resources/js/delete-emp.js',
    ])
</body>

</html>
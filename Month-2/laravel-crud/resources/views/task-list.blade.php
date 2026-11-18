<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="p-10">
    <div class="row mt-10">
        <div class="col-2 border p-3 rounded-4">Project ID</div>
        <div class="col-2 border p-3 rounded-4">Name</div>
        <div class="col-2 border p-3 rounded-4">Description</div>
        <div class="col-2 border p-3 rounded-4">Status</div>
        <div class="col-2 border p-3 rounded-4">Priority</div>
        <div class="col-2 border p-3 rounded-4">Due Date</div>
    </div>


    @foreach ($tasks as $task)
    <div class="row">
        @foreach ($task as $t)
        <div class="col-2 border p-3 rounded-4">{{ $t }}</div>
        @endforeach
    </div>
    @endforeach
</body>

</html>
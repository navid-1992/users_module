<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Module</title>
</head>
<body>
    <form method="post" action="{{route('modules.store')}}">
        @csrf
        <div>
            <label>Module Name</label>
            <input type="text" name="name" placeholder="Enter Module Name">
        </div>
        <div>
            <label>Module Type</label>
            <input type="text" name="type" placeholder="Enter Module Type">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

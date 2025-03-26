<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add User</title>
</head>
<body>
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div>
        <label for="name">Name</label>
        <input name="name" placeholder="Enter username"/>
    </div>

    <div>
        <label for="email">Email</label>
        <input name="email" placeholder="Enter email"/>
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" placeholder="Enter password"/>
    </div>
    <div>
        <label for="Module">Module</label>
        <select name="module_id[]" multiple>
            @foreach($modules as $module)
                <option value="{{$module->id}}">{{$module->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Submit</button>
</form>
</body>
</html>

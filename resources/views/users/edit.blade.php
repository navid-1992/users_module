<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update User</title>
</head>
<body>
<form action="{{route('users.update',$user->id)}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="name"></label>
        <input name="name" placeholder="Enter username" value="{{$user->name}}"/>
    </div>

    <div>
        <label for="email"></label>
        <input name="email" placeholder="Enter email" value="{{$user->email}}"/>
    </div>
    <div>
        <label for="password"></label>
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
    <button type="submit">Update</button>
</form>
</body>
</html>

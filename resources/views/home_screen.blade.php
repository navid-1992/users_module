<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
</head>

<body style="">
@if(session()->has('message'))
    <span>{{session('message')}}</span>
@endif
<br/>
<h1>List of Users</h1>
<a href="{{route('users.create')}}">
    <button>Add User</button>
</a>
<table border="1">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Module Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @foreach($user->modules as $module)
                    {{$module->name}},
                @endforeach
            </td>
            <td>
                <a href="{{route('users.edit',$user->id)}}">
                    Edit
                </a>
                <form action="{{route('users.destroy',$user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<h1>List of Modules</h1>
<a href="{{route('modules.create')}}">
    <button>Add Module</button>
</a>
<table border="1">
    <thead>
    <tr>
        <th>Module Name</th>
        <th>Module Type</th>
    </tr>
    </thead>
    <tbody>
    @foreach($modules as $module)
        <tr>
            <td>{{$module->name}}</td>
            <td>{{$module->type}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>

</html>

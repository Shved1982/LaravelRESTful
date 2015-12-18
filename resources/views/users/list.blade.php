@extends('main')
@section('content')

<table>
    <thead>
        <th>id</th>
        <th>Username</th>
        <th>E-mail</th>
        <th>Password</th>
        <th>Is active</th>
        <th>Create date</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->is_active}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <a href="{{action('UsersController@edit',['user' => $user->id])}}">Edit</a>
                <form method="POST" action="{{action('UsersController@destroy',['user' => $user->id])}}">
                    <input type="hidden" name="_method" value="delete"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" value="Remove"/>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    

    @if(Session::has('user'))
    {{Session::get('user')}}
    @endif
</table>
@endsection
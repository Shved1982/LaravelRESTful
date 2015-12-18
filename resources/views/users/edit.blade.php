@extends('main')
@section('content')
    <form method="POST" action="{{action('UsersController@update',['users'=>$users->id])}}"/>
        Update user<br>
        <input type="text" name="username" value="{{$users->username}}" /><br>
        <input type="text" name="email"  value="{{$users->email}}" /><br>
        <input type="password" name="password"  value="{{$users->password}}" /><br>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="put"/>
        <input type="submit" value="Update">
        @if(Session::has('user'))
        {{Session::get('user')}}
        @endif
    </form>
@endsection
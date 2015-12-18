@extends('main')
@section('content')

<form method="POST" action="{{action('UsersController@store')}}"/>
    Input new user<br>
    <input type="text" name="username"/><br>
    <input type="text" name="e-mail"/><br>
    <input type="password" name="password"/><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit" value="Save">

    @if(Session::has('user'))
    {{Session::get('user')}}
    @endif
</form>

@endsection
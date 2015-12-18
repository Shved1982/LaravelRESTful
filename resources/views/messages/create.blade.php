@extends('main')
@section('content')

<form method="POST" action="{{action('MessagesController@store')}}"/>
    Input message<br>
    <input type="text" name="user_to"/><br>
    <input type="text" name="user_from"/><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit" value="Save">

    @if(Session::has('message'))
    {{Session::get('message')}}
    @endif
</form>

@endsection
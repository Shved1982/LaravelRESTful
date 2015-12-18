@extends('main')
@section('content')
    <form method="POST" action="{{action('MessagesController@update',['message'=>$message->id])}}"/>
        Update message<br>
        <input type="text" name="user_to" value="{{$message->user_to}}" /><br>
        <input type="text" name="user_from"  value="{{$message->user_from}}" /><br>
        <textarea name="user_from">{{$message->value}}</textarea><br>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="_method" value="put"/>
        <input type="submit" value="Update">
        @if(Session::has('message'))
        {{Session::get('message')}}
        @endif
    </form>
@endsection
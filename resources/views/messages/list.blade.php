@extends('main')
@section('content')

<table>
    <thead>
        <th>id</th>
        <th>User from</th>
        <th>User to</th>
        <th>Message</th>
        <th>Is active</th>
        <th>Send date</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{!empty($message->userSender->username)? $message->userSender->username: $message->user_from}}</td>
            <td>{{!empty($message->userRecipient->username)? $message->userRecipient->username: $message->user_to}}</td>
            <td>{{$message->value}}</td>
            <td>{{$message->is_active}}</td>
            <td>{{$message->created_at}}</td>
            <td>
                <a href="{{action('MessagesController@edit',['message' => $message->id])}}">Edit</a>
                <form method="POST" action="{{action('MessagesController@destroy',['message' => $message->id])}}">
                    <input type="hidden" name="_method" value="delete"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" value="Remove"/>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    

    @if(Session::has('message'))
    {{Session::get('message')}}
    @endif
</table>
@endsection
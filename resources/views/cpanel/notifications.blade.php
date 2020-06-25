@extends('layouts.master')

@section('title', 'Notifications')

@section('content')
    @if(auth()->user()->role_id != 1)
    @foreach(auth()->user()->notifications as $notification)
        <form method="post" action="{{route('cpanel.NotificationsPost')}}">
            @csrf
        @if($notification->unread())
        {{$notification->data['Greeting']}}<br>
        {{$notification->data['body']}}<br>
            <input type="hidden"  name="notification_id" value="{{$notification->id}}">
            <button type="submit" name="submit" value="yes" class="btn btn-success">yes</button>
            <button type="submit" name="submit" value="no" class="btn btn-danger">No</button>
            @endif
        </form>
    @endforeach
    @endif
@stop

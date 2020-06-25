@extends('layouts.master')

@section('title', 'Home')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            {{Session::get('success')}}
        </div>
    @endif
    @if(auth()->user()->role_id == 3)
    <form method="post" action="{{route('MakeAppointment',$currentUser->id)}}">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Your Pain Please To Make Appointment</label>
            <select name="pain_id" class="form-control" >
                <option disabled="disabled">Select</option>
                @foreach ($pains as $pain)
                    <option  value="{{$pain->id}}">{{$pain->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Make Appointment</button>
    </form>


    @endif
@stop


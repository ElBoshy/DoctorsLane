@extends('layouts.master')

@section('title', 'Send Notification')

@section('content')

    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            {{Session::get('success')}}
        </div>
    @endif
    <form method="post" action="{{route('cpanel.SendNotificationPost')}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Patient</label>
            <select name="patient_id" class="form-control" >
                <option disabled="disabled">Select</option>
                @foreach ($patients as $patient)
                    <option  value="{{$patient->id}}">{{$patient->username.' '.$patient->pain->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Doctor</label>
            <select name="doctor_id" class="form-control" >
                <option disabled="disabled">Select</option>
                @foreach ($doctors as $doctor)
                    <option  value="{{$doctor->id}}">{{$doctor->username.' '.$doctor->speciality->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Date</label>
            <input name="date" value="{{old('date')}}" type="datetime-local" class="form-control"  placeholder="date">
        </div>

        <button type="submit" class="btn btn-primary">Send Notification</button>
    </form>


@stop

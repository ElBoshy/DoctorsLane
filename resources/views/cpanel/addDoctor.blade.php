@extends('layouts.master')

@section('title', 'Add Doctor')

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
    <form method="post" action="{{route('cpanel.CreateDoctor')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">username</label>
            <input name="username" value="{{old('username')}}" type="text" class="form-control"  placeholder="username">
        </div>
        <div class="form-group">
            <label >password</label>
            <input name="password" type="password" class="form-control"  placeholder="password">
        </div>
        <div class="form-group">
            <label >Confirm Password</label>
            <input name="password_confirmation"  type="password" class="form-control"  placeholder="confirm password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Speciality</label>
            <select name="speciality" class="form-control" >
                <option disabled="disabled">Select</option>
                @foreach ($specialities as $speciality)
                    <option value="{{$speciality->id}}">{{$speciality->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop

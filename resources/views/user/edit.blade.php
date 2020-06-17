@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @csrf
                    <input name="name" type="text" placeholder="Name" value="{{old('name',$user->name)}}">
                    <input name="surname" type="text" placeholder="Surname" value="{{old('surname',$user->surname)}}">
                    <input name="age" type="number" placeholder="Age" value="{{old('age',$user->age)}}">
                    <input name="location" type="text" placeholder="Location"
                           value="{{old('location',$user->location)}}">
                    <input name="bio" type="text" placeholder="Bio" value="{{old('bio',$user->bio)}}">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

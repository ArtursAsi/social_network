@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="name" type="text" placeholder="Name">
                    <input name="surname" type="text" placeholder="Surname">
                    <input name="age" type="number" placeholder="Age">
                    <input name="location" type="text" placeholder="Location">
                    <input name="bio" type="text" placeholder="Bio">
                    <input name="picture" type="file">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

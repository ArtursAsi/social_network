@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('userAttributes.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="weight" type="number" placeholder="Weight">
                    <input name="height" type="number" placeholder="Height">
                    <input name="gender" type="radio" value="male">Male
                    <input name="gender" type="radio" value="female">Female
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

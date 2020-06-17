@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">{{$user->userData->name}}
                <p>Profile</p>
                <p>  <a href="{{route('gallery.target',$user)}}">Gallery</a></p>
            </div>


            <div class="card" style="width: 18rem;">
                <a href="{{$user->userData->getPicture()}}"><img src="{{$user->userData->getPicture()}}" alt="" style="width: 100%"></a>

                <div class="card-body">
                    <p class="card-text">Name: {{$user->userData->name}}</p>
                    <p class="card-text">Surname: {{$user->userData->surname}}</p>
                    <p class="card-text">Age: {{$user->userData->age}}</p>
                    <p class="card-text">Location: {{$user->userData->location}}</p>
                    <p class="card-text">Bio: {{$user->userData->bio}}</p>


                </div>
            </div>
        </div>

    </div>






@endsection

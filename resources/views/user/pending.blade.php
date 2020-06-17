@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-header">Profile</div>


            <div class="card" style="width: 18rem;">
                @foreach($users as $user)

                    <a href="#">
                        <img src="{{$user->userData->getPicture()}}" alt="" style="width: 100%">
                    </a>
                    <div class="card-body">
                        <p class="card-text">Name: {{$user->userData->name}}</p>
                        <p class="card-text">Surname: {{$user->userData->surname}}</p>
                        <p class="card-text">Location: {{$user->userData->location}}</p>
                        <form action="{{route('user.accept',$user)}}" method="post">
                            @csrf
                            <button type="submit" name="accept">Accept</button>
                        </form>
                        <form action="{{route('user.decline',$user)}}" method="post">
                            @csrf
                            <button type="submit" name="decline">Decline</button>
                        </form>


                    </div>
                @endforeach
            </div>
        </div>

    </div>






@endsection

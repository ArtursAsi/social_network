@extends('layouts.app')

@section('content')

    @if(isset($details))
        <div class="container">

            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Location</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $user)
                    <tr>
                        <td><a href="{{route('user.show',$user)}}">{{$user->name}}</a></td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->location}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @elseif(isset($message))
                <p>{{ $message }}</p>
            @endif
        </div>

@endsection

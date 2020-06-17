
@extends('layouts.app')

@section('content')
    <div class="container">

        <p class="align-content-center">{{$user->userData->name}} gallery</p>
        <div class="row justify-content-center mt-5">
            @forelse($user->userGalleries as $picture)
                <div class="col-4 card-deck p-2">
                    <div class="card">
                        <a href="{{$picture->getPicture()}}"><img src="{{$picture->getPicture()}}" alt=""  style="height: 200px;object-fit: cover" class=" w-100 d-inline-block"></a>
                    </div>
                </div>
            @empty
                <div>
                    <h5>There are no pictures in {{$user->userData->name}} gallery!!!</h5>
                </div>
            @endforelse
        </div>
    </div>
@endsection

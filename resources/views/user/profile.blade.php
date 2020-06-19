@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">

            <div class="col-4">

                <div class="card" style="width: 18rem;">
                    <div class="card-header"><p>Friends</p></div>

                    @foreach($friends as $friend)
                        <a href="{{route('user.show',$friend)}}">
                            <img src="{{$friend->userData->getPicture()}}" alt="" style="width: 100%">
                        </a>
                        <div class="card-body">
                            <p class="card-text">Name: {{$friend->userData->name}}</p>
                            <p class="card-text">Surname: {{$friend->userData->surname}}</p>
                            <p class="card-text">Location: {{$friend->userData->location}}</p>
                            <form action="{{route('user.delete',$friend->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="request" class="btn btn-outline-danger">Delete</button>
                            </form>


                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-4">


                <div class="card" style="width: 18rem;">
                    <div class="card-header"><p>Profile</p></div>

                    <a href="" data-toggle="modal" data-target="#myModal"><img src="{{$user->userData->getPicture()}}" alt=""
                                                                     style="width: 100%"></a>

                    <div class="card-body">

                        <p class="card-text">Name: {{$user->userData->name}}</p>
                        <p class="card-text">Surname: {{$user->userData->surname}}</p>
                        <p class="card-text">Age: {{$user->userData->age}}</p>
                        <p class="card-text">Location: {{$user->userData->location}}</p>
                        <p class="card-text">Bio: {{$user->userData->bio}}</p>
                        <a href="{{route('userAttributes.create',$user)}}">Attributes</a>
                        <a href="{{route('user.edit',$user)}}">Edit</a>
                        <a href="{{route('gallery.create',$user)}}">Gallery</a>
                        <a href="{{route('user.pending')}}">Pending friends</a>
                        <a href="{{route('user.password',$user)}}">Change Password</a>
                        <a href="{{route('user.email',$user)}}">Change E-mail</a>

                    </div>
                </div>
            </div>
            <div class="modal" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">My Picture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{$user->userData->getPicture()}}" alt=""
                                 style="width: 100%">
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('user.updatePicture',$user)}}" enctype="multipart/form-data"
                                  method="post">
                                @csrf
                                @method('PATCH')
                                <input type="file" name="picture">
                                <button class="btn btn-outline-primary">Upload</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">

                <div class="card" style="width: 18rem;">
                    <div class="row justify-content-center">
                        <form action="{{route('user.search')}}" method="POST" role="search">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                       placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              <i class="fa fa-search"></i>
            </button>
        </span>
                            </div>
                        </form>
                    </div>
                    <div class="card-header"><p>Near You</p></div>

                    @foreach($users as $user)

                        <a href="{{route('user.show',$user)}}">
                            <img src="{{$user->userData->getPicture()}}" alt="" style="width: 100%">
                        </a>
                        <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{$user->userData->getPicture()}}" alt=""
                                             style="width: 100%">
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Name: {{$user->userData->name}}</p>
                            <p class="card-text">Surname: {{$user->userData->surname}}</p>
                            <p class="card-text">Location: {{$user->userData->location}}</p>
                            <form action="{{route('user.request',$user)}}" method="post">
                                @csrf
                                <button type="submit" name="request" class="btn btn-outline-success"
                                >Send Request
                                </button>
                            </form>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>



    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>



@endsection

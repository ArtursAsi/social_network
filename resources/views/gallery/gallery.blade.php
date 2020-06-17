@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="name[]" type="file" multiple>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="row">

                    @forelse($user->userGalleries as $picture)
                    <div class="col-4">
                        <a href="{{$picture->getPicture()}}"><img class="w-75 h-75" src="{{$picture->getPicture()}}" alt=""></a>
                        <form action="{{route('gallery.destroy',$picture->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <form action="{{route('gallery.update',$picture->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Update</button>
                        </form>
                    </div>

                    @empty
                        No pictures

                @endforelse
            </div>
        </div>
    </div>
@endsection

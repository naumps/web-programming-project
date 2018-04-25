@extends('layouts.app')
@section('content')
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">All Actors</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                @if($role ==='admin' || $role ==='editor')
                    <a href="{{route('create_actor')}}" class="btn btn-primary my-2">Create new actor</a>
                @endif
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Actors:</h2>
            <div class="row">

                @foreach($actors as $actor)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <img class="img-thumbnail" src="{{$actor->image_url}}" alt="Card image cap">
                                <h3>{{$actor->name}}</h3>
                                <p class="card-text">{{$actor->bio}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">


                                        <a class="btn btn-sm btn-primary" href="{{route('show_actor',$actor)}}">View</a>

                                        @auth


                                            @if($role ==='admin' || $role ==='editor')
                                                <a href="{{route('edit_actor',$actor)}}" class="btn btn-sm btn-secondary" type="submit">Edit</a>
                                                <form method="POST"
                                                      action="{{route('delete_actor',$actor)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-sm  btn-danger" type="submit">Delete</button>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                    <small class="text-muted">{{$actor->birth_date}}</small>
                                    <small class="text-muted">{{$actor->location}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </div>
    </div>

</main>
@endsection
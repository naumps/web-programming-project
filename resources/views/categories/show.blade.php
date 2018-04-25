@extends('layouts.app')
@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{$category->name}} Movies</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                @if(auth()->guest())
                    <a href="{{route('login')}}" class="btn btn-primary my-2">Log in</a>
                    <a href="{{route('register')}}" class="btn btn-secondary my-2">Sign up</a>
                @else


                @endif
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">


            <div class="row">
                @foreach($movies as $movie)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{asset($movie->image_url)}}" alt="Card image cap">
                            <div class="card-body">
                                <a href="{{route('show_movie',$movie)}}"><h4>{{$movie->name}}</h4></a>
                                <small class="text-muted">Release date: {{$movie->date}}</small>

                                <p class="card-text">{{$movie->desc}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="{{route('show_movie',$movie)}}" >View</a>
                                        @if($role==='admin' || $role==='editor')

                                            <a  class="btn btn-sm btn-warning" href="{{route('edit_movie',$movie)}}" >Edit</a>

                                        @endif



                                    </div>
                                    <small class="text-muted">Rating: {{$movie->rating}}</small>
                                    <small class="text-muted">Length: {{$movie->length}}min</small>

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

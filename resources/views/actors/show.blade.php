@extends('layouts.app')
@section('content')

    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <img src="{{$actor->image_url}}" alt="Card image cap">
                <h1 class="jumbotron-heading">{{$actor->name}}</h1>
                <p class="lead text-muted">{{$actor->bio}}</p>
                <h4>Born: {{$actor->birth_date}} in {{$actor->location}}</h4>
                <p>
                <p>

                    @if($role ==='admin' || $role ==='editor')
                        <a href="{{route('edit_actor',$actor)}}" class="btn btn-primary my-2">Edit</a>
                    @endif

                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <h2>Movies with {{$actor->name}}:</h2>
                <div class="row">

                    @foreach($movies as $movie)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">

                                <section class="jumbotron text-center">
                                    <div class="container">
                                        <img class="img-thumbnail" src="{{public_path().asset($movie->image_url)}}"
                                             alt="{{asset($movie->image_url)}}">
                                        <h1 class="jumbotron-heading"><a
                                                    href="{{route('show_movie',$movie)}}">{{$movie->name}}</a></h1>
                                        <p class="lead text-muted">{{$movie->desc}}</p>

                                        <h4>Rating: {{$movie->getRating()}}</h4>
                                        <h4>Length: {{$movie->length}}</h4>
                                        <p>

                                    </div>
                                </section>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
        </div>

    </main>
@endsection
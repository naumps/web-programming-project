@extends('layouts.app')
@section('content')

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <img  src="{{$director->image_url}}" alt="Card image cap">
            <h1 class="jumbotron-heading">{{$director->name}}</h1>
            <p class="lead text-muted">{{$director->bio}}</p>
            <h4>Born: {{$director->birth_date}} in {{$director->location}}</h4>
            <p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Movies of {{$director->name}}:</h2>
            <div class="row">

                @foreach($moviesOfDirector as $movie)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">

                            <section class="jumbotron text-center">
                                <div class="container">
                                    <img class="img-thumbnail" src="{{$movie->image_url}}" alt="Card image cap">
                                    <h1 class="jumbotron-heading"><a href="{{route('show_movie',$movie)}}">{{$movie->name}}</a></h1>
                                    <p class="lead text-muted">{{$movie->desc}}</p>
                                    <h4>Rating: {{$movie->rating}}</h4>
                                    <h4>Length: {{$movie->length}}</h4>
                                    <h4>Director: <a href="{{route('show_director',$director)}}">{{$director->name}}</a></h4>
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

@extends('layouts.app')
@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{$list->name}} </h1>
            <p class="lead text-muted"></p>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">


            <h2>Movies in this list:</h2>
            <div class="row">
                @foreach($movies as $movie)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{asset($movie->image_url)}}" alt="{{$movie->image_url}}">
                            <div class="card-body">
                                <a href="{{route('show_movie',$movie)}}"><h4>{{$movie->name}}</h4></a>
                                <small class="text-muted">Release date: {{$movie->date}}</small>

                                <p class="card-text">{{$movie->desc}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="{{route('show_movie',$movie)}}" >View</a>

                                        @if(auth()->user()->role==='admin' || auth()->user()->role==='editor')

                                            <a  class="btn btn-sm btn-warning" href="{{route('edit_movie',$movie)}}" >Edit</a>

                                        @endif
                                        <form method="POST" action="{{route('remove_movie_from_list',['list'=>$list,'movie'=>$movie])}}">
                                            {{csrf_field()}}
                                            <button class="btn btn-danger">Delete from this list</button>

                                        </form>


                                    </div>
                                    <small class="text-muted">Rating: {{number_format($movie->getRating(),1)}}</small>
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
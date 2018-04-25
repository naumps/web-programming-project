@extends('layouts.app')
@section('content')

    <div class="album py-5 bg-light">
        <div class="container">


            <div class="row h-20">

                @foreach($movies as $movie)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow ">
                            <div class="  h-100">
                                <img class="card-img-top" style="height: 300px;"
                                     src="{{$movie->Poster}}"
                                     alt="no poster">
                            </div>


                            <div class="card-body">
                                <div>
                                    <h4>
                                        {{$movie->Title}}
                                    </h4>

                                </div>

                                <small class="text-muted">Release date: {{$movie->Year}}</small>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">


                                    </div>

                                </div>
                                <form method="POST" action="{{route('store_movie_from_omdb',['id'=>$movie->imdbID])}}">
                                    {{csrf_field()}}
                                    <button type="submit"
                                       class="btn btn-outline-primary">Sync this movie</button>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

@endsection
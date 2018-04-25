@extends('layouts.app')
@section('content')

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <div>
                <img class="center-block img-thumbnail" align="center" width="30%" src="{{asset($movie->image_url)}}"
                     alt="Card image cap">
            </div>
            @auth
                <div class="btn-group">
                    <button type="button" class="btn btn-primary " style="float:left; width: 325px"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add to my list
                    </button>
                    <div class="dropdown-menu">

                        @foreach($lists as $list)
                            @if(!$list->contains($movie))
                                <button class="dropdown-item add-to-list"
                                        value="{{$list->id}} {{$movie->id}}">{{$list->name}}</button>
                            @else
                                <button class="dropdown-item delete-from-list"
                                        value="{{$list->id}} {{$movie->id}}">Delete from:{{$list->name}}</button>
                            @endif

                        @endforeach

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{route('create_list',['movie'=>$movie->id])}}">Add in new list</a>
                    </div>
                </div>
            @else

                <div class="btn-group">
                    <a href="{{route('login')}}" class="btn btn-primary "
                       style="float:left; width: 325px">
                        Add to my list
                    </a>
                </div>
            @endauth
            <h1 class="jumbotron-heading">{{$movie->name}}</h1>
            <p class="lead text-muted">{{$movie->desc}}</p>
            <h4>Release date: {{$movie->date}}</h4>

            <h4>Rating: {{number_format($movieRating,1)}}</h4>
            <h4>Length: {{$movie->length}} min</h4>
            <h4>Categories:

                @foreach($categories as $category)
                    <a href="{{route('show_category',$category)}}">{{$category->name}}</a>
                @endforeach
            </h4>
            @if($director===null)

                <h4>Director:</h4>
            @else

                <h4>
                    Director: <a href="{{route('show_director',$director)}}">{{$director->name}}</a>
                </h4>
            @endif



            @guest

                <p>Please <a href="{{route('login')}}">sign in</a> to participate.

            @else

                @if($role !=='subscriber')
                            <a href="{{route('edit_movie',$movie)}}" class="btn btn-primary my-2">Edit</a>
                @endif



                @if(is_null($isRatedByAuthUser))
                    <form method="POST" action="{{route('store_rating',['movie'=>$movie,'user'=>auth()->user()])}}">
                        {{csrf_field()}}
                        <label for="input-1" class="control-label">Rate this movie:</label>
                        <input id="rating" name="rating" class="rating rating-loading" data-min="5" data-max="10"
                               data-step="0.5" value="0">
                        <button type="submit">Rate</button>
                    </form>
                @else
                    <form method="POST" action="{{route('update_rating',['movie'=>$movie,'user'=>auth()->user()])}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <label for="input-1" class="control-label">You have rated this movie already with:</label>
                        <input id="rating" name="rating" class="rating rating-loading" data-min="5" data-max="10"
                               data-step="0.5" value="{{$isRatedByAuthUser->rating}}">
                        <button type="submit">Rate</button>
                    </form>

                @endif

            @endguest



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
                                            <a href="{{route('edit_actor',$actor)}}" class="btn btn-sm btn-secondary"
                                               type="submit">Edit</a>


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
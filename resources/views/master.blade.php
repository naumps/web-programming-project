@extends('layouts.app')


@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Movies</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                    creator,
                    etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>


                    @if(auth()->guest())
                        <a href="{{route('login')}}" class="btn btn-primary my-2">Log in</a>
                        <a href="{{route('register')}}" class="btn btn-secondary my-2">Sign up</a>
                <div class="form-group">
                    <a href="{{ route('redirect_to_provider',['provider'=>'github']) }}" class="btn btn-github"><i
                                class="fa fa-github"></i> Github</a>
                    <a href="{{ route('redirect_to_provider',['provider'=>'twitter']) }}" class="btn btn-twitter"><i
                                class="fa fa-twitter"></i> Twitter</a>
                    <a href="{{ route('redirect_to_provider',['provider'=>'facebook']) }}" class="btn btn-facebook"><i
                                class="fa fa-facebook"></i> Facebook</a>
                </div>
                @else
                    @if($role!=='subscriber' && $role!=='user')
                        <a href="{{route('create_movie')}}" class="btn btn-primary my-2">Create new movie</a>
                        <a href="{{route('create_actor')}}" class="btn btn-primary my-2">Create new actor</a>
                    @endif

                    @if($role === 'admin')

                        <a href="{{route('create_user')}}" class="btn btn-secondary my-2">Create user</a>
                        @endif
                        @endif
                        </p>
                        <div id="search-box">
                            <!-- SearchBox widget will appear here -->

                        </div>
            </div>


        </section>

        <div id="categories"  style="float:right; display: inline-block">

        </div>

        <div class="hits-container">
            <div class="album py-5 bg-light">
                <div class="container">

                    <div class="row h-20">
                        <div id="hits">
                            <!-- Hits widget will appear here -->
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="main-container">
            <div class="album py-5 bg-light">
                <div class="container">



                    <div class="row h-20">

                        @foreach($movies as $movie)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow ">
                                    <div class="  h-100">
                                        <img class="card-img-top" style="height: 300px;"
                                             src="{{asset($movie->image_url)}}"
                                             alt="{{$movie->image_url}}">
                                    </div>

                                    @auth
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary "
                                                    style="float:left; width: 400px"
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
                                                                value="{{$list->id}} {{$movie->id}}">Delete
                                                            from:{{$list->name}}</button>
                                                    @endif

                                                @endforeach

                                                <div class="dropdown-divider"></div>

                                                <a class="dropdown-item"
                                                   href="{{route('create_list',['movie'=>$movie->id])}}">Add in new
                                                    list</a>
                                            </div>
                                        </div>
                                    @else

                                        <div class="btn-group">
                                            <a href="{{route('login')}}" class="btn btn-primary "
                                               style="float:left; width: 400px">
                                                Add to my list
                                            </a>
                                        </div>
                                    @endauth


                                    <div class="card-body">
                                        <div>
                                            <a href="{{route('show_movie',$movie)}}">
                                                <h4>
                                                    {{$movie->name}}
                                                </h4>
                                            </a>

                                        </div>

                                        <small class="text-muted">Release date: {{$movie->date}}</small>

                                        <p class="card-text">{{$movie->desc}}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-outline-secondary"
                                                   href="{{route('show_movie',$movie)}}">View</a>
                                                @if($role==='admin' || $role==='editor')

                                                    <a class="btn btn-sm btn-warning"
                                                       href="{{route('edit_movie',$movie)}}">Edit</a>

                                                @endif


                                            </div>
                                            <small class="text-muted">
                                                Rating: {{number_format($movie->getRating(),1)}}</small>
                                            <small class="text-muted">Length: {{$movie->length}}min</small>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>
                <div class="row h-100 justify-content-center align-items-center">

                    {{$movies->render()}}
                </div>

            </div>
        </div>


    </main>


@endsection



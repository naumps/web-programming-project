
@extends('layouts.app')
@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Directors</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                @if(auth()->guest())
                    <a href="{{route('login')}}" class="btn btn-primary my-2">Log in</a>
                    <a href="{{route('register')}}" class="btn btn-secondary my-2">Sign up</a>
                @else

                    @if($role === 'admin' OR $role ==='editor')

                        <a href="{{route('create_director')}}" class="btn btn-secondary my-2">Add new director</a>
                    @endif
                @endif
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Directors:</h2>
            <div class="row">

                @foreach($directors as $director)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <img class="img-thumbnail" src="{{$director->image_url}}" alt="Card image cap">
                                <h3>{{$director->name}}</h3>
                                <p class="card-text">{{$director->bio}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">


                                        <a class="btn btn-sm btn-primary" href="{{route('show_director',$director)}}">View</a>

                                        @if($role ==='admin' || $role ==='editor')
                                            <a href="{{route('edit_director',$director)}}" class="btn btn-sm btn-secondary" type="submit">Edit</a>

                                            @if($role ==='admin')
                                                <form method="POST"
                                                      action="{{route('delete_director',$director)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-sm  btn-danger" type="submit">Delete</button>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                    <small class="text-muted">{{$director->birth_date}}</small>
                                    <small class="text-muted">{{$director->location}}</small>
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
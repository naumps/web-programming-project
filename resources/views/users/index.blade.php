@extends('layouts.app')
@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Users</h1>
            <p class="lead text-muted">Here you can edit all users</p>
            <p>
                <a href="{{route('create_user')}}" class="btn btn-secondary my-2">Create user</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">


            <div class="row">
                @foreach($users as $user)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h4 class="card-text">Username: {{$user->name}}</h4>
                                <p class="card-text">Email: {{$user->email}}</p>
                                <p class="card-text">Member since: {{$user->created_at}}</p>
                                <p class="card-text">Role: {{$user->role}}</p>
                                @if($user->role!== 'subscriber')
                                    <p class="card-text"><a href="{{route('movies_of_user',$user)}}">Movies created by
                                            this user</a></p>
                                @endif
                                <p class="card-text"><a href="{{route('edit_user',$user)}}">Edit this user</a></p>


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

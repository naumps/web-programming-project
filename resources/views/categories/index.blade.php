@extends('layouts.app')
@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Categories</h1>
            <p class="lead text-muted">You can filter throught categories, add new categories and delete categories.</p>
            <p>

                @foreach($categories as $category)
                    <a href="{{route('show_category',$category)}}" class="btn btn-success">{{$category->name}}</a>
                @endforeach
            </p>
            <p>
                @guest()
                    <a href="{{route('login')}}" class="btn btn-primary my-2">Log in</a>
                    <a href="{{route('register')}}" class="btn btn-secondary my-2">Sign up</a>
                @else
                    @if($role ==='admin' || $role ==='editor')
                    <a href="{{route('create_category')}}" class="btn btn-primary my-2">Add new category</a>
                    <a href="{{route('delete_category')}}" class="btn btn-danger my-2">Delete category</a>
                    @endif
                @endguest
            </p>
        </div>
    </section>





</main>

@endsection

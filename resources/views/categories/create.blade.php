@extends('layouts.app')
@section('content')

<main role="main">
    <div class="form-control">
        <form method="POST" action="{{route('store_category')}}">
            {{csrf_field()}}

            <h3>Create new category</h3>
            <div class="form-group">
                @foreach($allCategories as $category)
                        <a href="{{route('show_category',$category)}}" class="btn btn-success">{{$category->name}}</a>
                @endforeach
            </div>
            <form action="{{route('store_category')}}">


                <div class="form-group">
                    <label for="name">Category:</label>
                    <input type="text" placeholder="New category" class="form-control" id="name"
                    name="name">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

            @if($errors->any())
                <ul class="alert alert-danger">

                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
            @endif

        </form>
    </div>

</main>

@endsection
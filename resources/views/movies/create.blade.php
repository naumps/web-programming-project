@extends('layouts.app')
@section('content')

<main role="main">
    <div class="form-control">
    <form method="POST" action="{{route('store_movie')}}" enctype="multipart/form-data">
        {{csrf_field()}}



        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" class="form-control" id="name" placeholder="title" name="name" required >
        </div>

        <div class="form-group">
            <label for="length">Length in minutes:</label>
            <input type="number" class="form-control" id="length" placeholder="length" name="length" required >
        </div>

        <div class="form-group">
            <label for="date">Relise date:</label>
            <input type="date" class="form-control" id="date" placeholder="Date" name="date" required >
        </div>




        <div class="form-group">
            <label for="image_url">Image url:</label>
            <input type="file" class="form-control" id="image_url" name="image_url" >
        </div>



        <div class="form-group">
            <label for="desc">Description:</label>
            <textarea name="desc" id="desc"  placeholder="Short description of the movie" rows="5" class="form-control" required ></textarea>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
            <a href="{{route('syncFromOmdb')}}" class="btn btn-primary">Get movie from OMDB</a>
        </div>



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
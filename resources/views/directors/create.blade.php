@extends('layouts.app')
@section('content')

<main role="main">
    <div class="form-control">
        <form method="POST" action="{{route("director_store")}}">
            {{csrf_field()}}

            <div class="form-group">
                <h2>Create new director:</h2>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" required >
            </div>

            <div class="form-group">
                <label for="birth_date">Birth date:</label>
                <input type="date" class="form-control" id="birth_date" placeholder="Date" name="birth_date" required >
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" placeholder="location" class="form-control" id="location"  name="location" required >
            </div>

            <div class="form-group">
                <label for="image_url">Image url:</label>
                <input type="text" placeholder="url" class="form-control" id="image_url"  name="image_url" required >
            </div>


            <div class="form-group">
                <label for="bio">Biography:</label>
                <textarea name="bio" id="bio"  placeholder="Short biography of the director" rows="5" class="form-control" required ></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>

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
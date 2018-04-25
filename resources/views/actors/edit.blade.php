@extends('layouts.app')

@section('content')
<main role="main">
    <div class="form-control">
        <form method="POST" action="{{route('actor_update',$actor)}}">
            {{csrf_field()}}
            {{method_field("PATCH")}}


            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$actor->name}}" required >
            </div>

            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" id="slug" placeholder="slug" name="slug"
                       value="{{$actor->slug}}" >
            </div>

            <div class="form-group">
                <label for="birth_date">Birth date:</label>
                <input type="text" class="form-control" id="birth_date" placeholder="Date" name="birth_date" value="{{$actor->birth_date}}" required >
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" placeholder="location" class="form-control" id="location"  name="location" value="{{$actor->location}}" required >
            </div>

            <div class="form-group">
                <label for="image_url">Image url:</label>
                <input type="text" placeholder="url" class="form-control" id="image_url"  name="image_url" value="{{$actor->image_url}}"required >
            </div>


            <div class="form-group">
                <label for="bio">Biography:</label>
                <textarea name="bio" id="bio"  placeholder="Short biography of the director" rows="5" class="form-control"  required >{{$actor->bio}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
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
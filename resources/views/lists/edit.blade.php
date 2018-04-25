@extends('layouts.app')
@section('content')
<main role="main">
    <div class="form-control">


        <form method="POST" action="{{route('update_list',$list)}}">
            {{csrf_field()}}


            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" id="name" placeholder="title" name="name"
                       value="{{$list->name}}" required>
            </div>


            <div class="form-control">

                <h3>Add new movie to the list: </h3>
                <div class="form-group">
                    <select class="" id="movies" name="movies[]" style="width: 200px; height: 200px" multiple>
                        @foreach($movies as $movie)
                            <div class="checkbox-inline">

                                <label>
                                    <option value="{{$movie->id}}" selected="selected">{{$movie->name}}</option>
                                </label>
                            </div>
                        @endforeach
                        @foreach($moviesThatAreNotInTheList as $movie)
                            <div class="checkbox-inline">

                                <label>
                                    <option value="{{$movie->id}}">{{$movie->name}}</option>
                                </label>
                            </div>
                        @endforeach
                    </select>


                </div>


            </div>


            @if($errors->any())
                <ul class="alert alert-danger">

                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>
        @endif
            <hr/>
            <button type="submit" class="btn btn-primary">Save</button>

    </div>


    </form>
    </div>

</main>

@endsection
@extends('layouts.app')
@section('content')

<main role="main">
    <div class="form-control">

        <h2>Create new List</h2>

        <form method="POST" action="{{route('store_list')}}">
            {{csrf_field()}}


            <div class="form-group">
                <label for="name">Name of the list:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
            </div>

            <select class="" id="movies" name="movies[]" style="width: 200px; height: 200px" multiple>
                @foreach($movies as $m)
                    <div class="checkbox-inline">

                        <label>
                            @if($m->id == $movie)
                            <option value="{{$m->id}}" selected="selected">{{$m->name}}</option>
                            @else
                                <option value="{{$m->id}}" >{{$m->name}}</option>
                            @endif
                        </label>
                    </div>
                @endforeach

            </select>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save my list</button>
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
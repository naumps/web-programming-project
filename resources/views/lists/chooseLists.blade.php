@extends('layouts.app')
@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{$movie->name}} </h1>
            <p class="lead text-muted">Choose lists where to add</p>
            <p>

            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <form method="POST" action="{{route('add_movie',$movie)}}">
                {{csrf_field()}}

                <select class="" id="lists" name="lists[]" style="width: 200px; height: 100px" multiple>
                    @foreach($lists as $list)
                        <div class="checkbox-inline">

                            <label>
                                <option value="{{$list->id}}" >{{$list->name}}</option>
                            </label>
                        </div>
                    @endforeach

                </select>


                </select>
                <div>


                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>




        </div>
    </div>
    </div>

</main>
@endsection
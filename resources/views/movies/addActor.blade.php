@extends('layouts.app')
@section('content')
<main role="main">
    <div class="form-control">
        <form method="POST" action="{{route('add_actor',$movie)}}">
            {{csrf_field()}}

            <h3>Choose director</h3>
            <div class="form-group">
                <select id="actor" class="dropdown" name="actor">
                    @foreach($actors as $actor)
                        <div class="checkbox-inline">

                            <label>
                                <option value="{{$actor->id}}">{{$actor->name}}</option>
                            </label>
                        </div>
                    @endforeach
                </select>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
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

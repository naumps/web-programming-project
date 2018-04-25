@extends('layouts.app')
@section('content')

<main role="main">
    <div class="form-control">
        <form method="POST" action="{{route('attach_category',$movie)}}">
            {{csrf_field()}}

            <h3>Add categories to the movie</h3>
            <div class="form-group">
                @foreach($allCategories as $category)
                    <div class="checkbox-inline">
                        @if(in_array($category->name,$movieCategoriesNames))
                            <label><input type="checkbox" name="category[]" checked value="{{$category->name}}">{{$category->name}}

                            </label>
                        @else
                            <label><input type="checkbox" name="category[]" value="{{$category->name}}">{{$category->name}}

                            </label>

                        @endif
                    </div>
                @endforeach


                <div class="form-group">
                    <label for="name">Category:</label>
                    <input type="text" placeholder="New {{$movie->name}} category" class="form-control" id="name"
                           name="name">
                </div>

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
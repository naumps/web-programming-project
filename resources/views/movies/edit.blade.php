@extends('layouts.app')
@section('content')

<main role="main">
    <div class="form-control">


        <form method="POST" action="{{route('save_edited_movie',$movie)}}" enctype="multipart/form-data">
            {{csrf_field()}}


            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" id="name" placeholder="title" name="name"
                       value="{{$movie->name}}" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" id="slug" placeholder="slug" name="slug"
                       value="{{$movie->slug}}" >
            </div>

            <div class="form-group">
                <label for="length">Length:</label>
                <input type="number" class="form-control" id="length" placeholder="length" name="length"
                       value="{{$movie->length}}" required>
            </div>

            <div class="form-group">
                <label for="date">Relise date:</label>
                <input type="date" class="form-control" id="date" placeholder="Date" name="date"
                       value="{{$movie->date}}" required>
            </div>




            <div class="form-group">
                <label for="image_url">Image url:</label>
                <input type="file" class="form-control" id="image_url" name="image_url" >
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" placeholder="Short description of the movie" rows="5"
                          class="form-control" required>{{$movie->desc}}</textarea>
            </div>


            <div class="form-group">


            </div>


            <div class="form-control">

                <h3>Add new actor to the movie: </h3>
                <div class="form-group">
                    <select class="" id="actor" name="actors[]" style="width: 200px; height: 200px" multiple>
                        @foreach($actors as $actor)
                            <div class="checkbox-inline">

                                <label>
                                    <option value="{{$actor->id}}" selected="selected">{{$actor->name}}</option>
                                </label>
                            </div>
                        @endforeach
                        @foreach($actorsThatAreNotInTheMovie as $actor)
                            <div class="checkbox-inline">

                                <label>
                                    <option value="{{$actor->id}}">{{$actor->name}}</option>
                                </label>
                            </div>
                        @endforeach
                    </select>


                </div>


            </div>


            <div class="form-control">


                <h3>Add categories to the movie</h3>
                <div class="form-group">
                    @foreach($allCategories as $category)
                        <div class="checkbox-inline">
                            @if(in_array($category->name,$movieCategoriesNames))
                                <label><input type="checkbox" name="category[]" checked
                                              value="{{$category->name}}">{{$category->name}}

                                </label>
                            @else
                                <label><input type="checkbox" name="category[]"
                                              value="{{$category->name}}">{{$category->name}}

                                </label>

                            @endif
                        </div>
                    @endforeach


                </div>


            </div>



                <div class="form-control">

                    <h3>Add director to the movie: </h3>
                    <div class="form-group">
                        <select id="director" name="director[]" style="width: 140px">

                            @if(empty($director))
                                <option selected="selected" value="0">Unknown</option>
                                @foreach($directors as $dir)
                                    <option value="{{$dir->id}}">{{$dir->name}}</option>
                                @endforeach
                            @else
                                <option value="0">Unknown</option>
                                <option value="{{$director->id}}" selected="selected">{{$director->name}}</option>
                                @foreach($directors as $dir)
                                    @if($dir->id !== $director->id)
                                        <option value="{{$dir->id}}">{{$dir->name}}</option>
                                    @endif
                                @endforeach
                            @endif


                        </select>


                    </div>


                    @if($errors->any())
                        <ul class="alert alert-danger">

                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach

                        </ul>
                    @endif

                </div>



            <button type="submit" class="btn btn-primary">Save</button>

        </form>
        <form method="POST" action="{{route('delete_movie',$movie)}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}

            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>


    </div>

</main>

@endsection
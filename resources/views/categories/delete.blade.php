@extends('layouts.app')
@section('content')

<main role="main">
    <div class="form-control">
        <form method="POST" action="{{route('delete_category')}}" class="form-group">
            {{csrf_field()}}
            {{method_field('DELETE')}}

            <h3>Delete categories</h3>
            <div class="form-group">
                <select id="name" class="dropdown" name="name">
                @foreach($allCategories as $category)
                    <div class="checkbox-inline">
                        <option value="{{$category->id}}">{{$category->name}}</option>


                    </div>
                @endforeach
                </select>



                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete</button>
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
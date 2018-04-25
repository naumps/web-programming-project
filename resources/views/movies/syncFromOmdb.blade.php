@extends('layouts.app')
@section('content')



    <main role="main">
        <div class="form-control">
            <div class="form-group">

                <form method="GET" action="{{route('return')}}">
                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input type="text" class="form-control searchtitle" id="name" placeholder="title" name="name"
                               required>
                    </div>

                    <button type="submit" class="btn">get movie</button>
                </form>
            </div>
        </div>

    </main>



@endsection
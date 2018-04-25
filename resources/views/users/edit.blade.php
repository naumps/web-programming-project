@extends('layouts.app')
@section('content')
<main role="main">
    <div class="form-control">
        <form method="POST" action="{{route('update_user',$user)}}">
            {{csrf_field()}}
            {{method_field("PATCH")}}


            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$user->name}}" required >
            </div>



            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" placeholder="email" class="form-control" id="email"  name="email" value="{{$user->email}}" required >
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role[]" id="role">

                    @foreach($roles as $r)
                        @if($user->role===$r)

                        <option class="form-control"  value="{{$r}}" selected="selected" >{{$r}}</option>
                        @else
                            <option class="form-control"  value="{{$r}}"  >{{$r}}</option>
                        @endif
                    @endforeach

                </select>
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
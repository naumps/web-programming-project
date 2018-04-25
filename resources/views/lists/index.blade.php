@extends('layouts.app')
@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">All lists created by all users</h1>
            <p class="lead text-muted">Only admins can see all lists!</p>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">


            <div class="row">
                @foreach($lists as $list)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <a href="{{route('show_list',$list)}}"><h4>{{$list->name}}</h4></a>
                                <small class="text-muted">Created by: {{$list->createdBy->name}}</small>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                       {{-- <a class="btn btn-sm btn-outline-secondary" href="{{route('show_movie',$movie)}}" >View</a>--}}
                                        {{--@if($role==='admin' || $role==='editor')

                                            <a  class="btn btn-sm btn-warning" href="{{route('edit_movie',$movie)}}" >Edit</a>

                                        @endif
--}}


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    </div>

</main>

@endsection

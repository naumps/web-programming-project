@extends('layouts.app')
@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Hi, {{$user->name}}! </h1>
                <p class="lead text-muted">Here are your lists:</p>
                <a href="{{route('create_list')}}" class="btn btn-primary my-2">Create new list</a>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">


                <div class="row">
                    @if($user->subscription('basic'))

                        @for($i =0 ;$i<count($lists);$i++)
                            @if($i<3)
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">

                                        <div class="card-body">
                                            <a href="{{route('show_list',$lists[$i])}}"><h4>{{$lists[$i]->name}}</h4>
                                            </a>
                                            <small class="text-muted">Created at: {{$lists[$i]->created_at}}</small>


                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-outline-secondary"
                                                       href="{{route('edit_list',$lists[$i])}}">Edit</a>
                                                    <form method="POST" action="{{route('delete_list',$lists[$i])}}">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete
                                                        </button>

                                                    </form>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">

                                        <div class="card-body">
                                            <a href="{{route('change_plan')}}"><h4>{{$lists[$i]->name}}</h4>
                                            </a>
                                            <small class="text-muted">Created at: {{$lists[$i]->created_at}}</small>


                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <p>
                                                    <a href="{{route('change_plan')}}">Change</a> your plan to view and edit
                                                    this list!
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    @else
                        @for($i =0 ;$i<count($lists);$i++)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">

                                    <div class="card-body">
                                        <a href="{{route('show_list',$lists[$i])}}">
                                            <h4>{{$lists[$i]->name}}</h4></a>
                                        <small class="text-muted">Created at: {{$lists[$i]->created_at}}</small>


                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-outline-secondary"
                                                   href="{{route('edit_list',$lists[$i])}}">Edit</a>
                                                <form method="POST"
                                                      action="{{route('delete_list',$lists[$i])}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete
                                                    </button>

                                                </form>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor


                    @endif

                </div>

            </div>
        </div>
        </div>

    </main>

@endsection
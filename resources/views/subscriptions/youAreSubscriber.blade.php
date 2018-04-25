@extends('layouts.app')
@section('content')

    <main role="main" >

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Your are already subscriber!</h1>
                <p class="lead text-muted">Click <a href="{{route('change_plan')}}">here</a> to change your plan.</p>
            </div>
        </section>



    </main>
@endsection
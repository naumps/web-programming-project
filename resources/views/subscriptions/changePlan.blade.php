@extends('layouts.app')
@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Change your {{$plan[0]}} plan</h1>
                <p class="lead text-muted">Here you can change your subscription plan.</p>
                <form action="{{route('cancel_subscription')}}" method="POST">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger">Cancel subscription</button>
                </form>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">


                <div class="row">
                    @if($plan[0]!=='basic')
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h2>Basic</h2>
                                    <p>With basic subscription you can create 3 lists with maximum 5 films. It will cost
                                        you 7$</p>
                                    <form action="{{route('store_changed_plan',['plan'=>'Basic: Acc'])}}" method="POST">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-outline-primary">Change to this plan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($plan[0]!=='regular')
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h2>Regular</h2>
                                    <p>With regular subscription you can create 5 lists with unlimited number of films.
                                        It will cost you 15$/month</p>
                                    <form action="{{route('store_changed_plan',['plan'=>'Regular: Acc'])}}"
                                          method="POST">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-outline-primary">Change to this plan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($plan[0]!=='premium')
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h2>Premium</h2>
                                    <p>With regular subscription you can create unlimited number of lists with unlimited
                                        number of films. It will cost you 30$/month</p>
                                    <form action="{{route('store_changed_plan',['plan'=>'Premium: Acc'])}}"
                                          method="POST">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-outline-primary">Change to this plan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </main>
@endsection
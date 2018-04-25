@extends('layouts.app')
@section('content')

    <main role="main" >

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Subscription plans</h1>
                <p class="lead text-muted">Here you can choose your subscription plan</p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">


                <div class="row">

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h2>Basic</h2>
                                <p>With basic subscription you can create 3 lists with maximum 5 films. It will cost you 7$</p>
                                <form action="{{route('post_basic_subscription')}}" method="POST">
                                    {{csrf_field()}}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{config('services.stripe.key')}}"
                                            data-amount="700"
                                            data-name="Codeart"
                                            data-description="Basic subscription"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-zip-code="true">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h2>Regular</h2>
                                <p>With regular subscription you can create 5 lists with unlimited number of films. It will cost you 15$/month</p>
                                <form action="{{route('post_regular_subscription')}}" method="POST">
                                    {{csrf_field()}}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{config('services.stripe.key')}}"
                                            data-amount="1500"
                                            data-name="Codeart"
                                            data-description="Regular subscription"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-zip-code="true">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h2>Premium</h2>
                                <p>With regular subscription you can create unlimited number of lists with unlimited number of films. It will cost you 30$/month</p>
                                <form action="{{route('post_premium_subscription')}}" method="POST">
                                    {{csrf_field()}}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{config('services.stripe.key')}}"
                                            data-amount="3000"
                                            data-name="Codeart"
                                            data-description="Premium subscription"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-zip-code="true">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </main>


    <script src="https://js.stripe.com/v3/"></script>
@endsection
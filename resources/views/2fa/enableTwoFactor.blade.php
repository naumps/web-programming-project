@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Here you can enable or disable two factor auth using google auth app</h1>
            Open up your 2FA <a target="new" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en">mobile app</a> and scan the following QR barcode:
            <br />
            <img alt="Image of QR barcode" src="{{ $image }}" />

            <br />
            <h4>If your 2FA mobile app does not support QR barcodes,
                enter in the following number: <code>{{ $secret }}</code></h4>
            <br /><br />
            <a href="{{ route('confirm_2fa') }}" class="btn btn-outline-primary">Next step</a>
        </div>
    </section>

@endsection
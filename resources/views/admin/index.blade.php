@extends('layouts.app')
@section('content')

<button class="btn filldatabase">get movie</button>
    @push('scripts')
        <script src="{{asset('js/fillDatabase.js')}}"></script>
    @endpush
@endsection
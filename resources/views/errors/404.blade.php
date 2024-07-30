@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Page Not Found') }}</div>

                <div class="card-body text-center">
                    <h1>404</h1>
                    <p>{{ __('Sorry, the page you are looking for could not be found.') }}</p>
                    <a href="{{ url('/') }}" class="btn btn-primary">{{ __('Go to Homepage') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

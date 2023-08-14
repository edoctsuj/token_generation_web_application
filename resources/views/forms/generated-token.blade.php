@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Generated Token</h2>
                </div>
                <div class="card-body text-center">
                    <p>Your token:</p>
                    <h3 class="mb-4"><strong>{{ $token }}</strong></h3>
                    <a href="{{ route('survey.form') }}" class="btn btn-secondary">Return to Survey Form</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

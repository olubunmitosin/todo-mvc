@extends('layouts.app')
@section('title', 'Create Todo')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card content-card">
                <div class="content-header d-flex justify-content-between align-content-center">
                    <h2 class="content-title">{{ __('Create Todo') }}</h2>
                    <a href="{{ url('/') }}" class="btn btn-sm btn-secondary">Go back</a>
                </div>

                <div class="card-body">
                    @include('partials.messages')

                </div>
            </div>
        </div>
    </div>
</div>
@stop
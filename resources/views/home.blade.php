@extends('layouts.app')
@section('title', 'Manage Todos')
@section('content')
<div class="container">
    <div class="row justify-content-center" id="todos">
        <div class="col-md-12">
            <div class="card content-card">
                <div class="content-header d-flex justify-content-between align-content-center">
                    <h2 class="content-title">{{ __('Manage Todos') }}</h2>
                    <a href="{{  route('todo.create.view') }}" class="btn btn-sm btn-secondary">Create Todo</a>
                </div>

                <div class="card-body">
                    @include('partials.messages')
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr class="table-primary">
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="todo-list"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

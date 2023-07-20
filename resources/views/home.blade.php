@extends('layouts.app')
@section('title', 'Manage Todos')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
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
                                    <th></th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($todos) && count($todos) > 0)
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <td></td>
                                            <td>{{ $todo->title }}</td>
                                            <td>{{ $todo->status }}</td>
                                            <td>{{ $todo->created_at }}</td>
                                            <td>{{ $todo->due_at }}</td>
                                            <td>
                                                <a href="{{  route('todo.edit.view', [$todo->id]) }}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">Todos list is empty!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

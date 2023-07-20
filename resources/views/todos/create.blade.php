@extends('layouts.app')
@section('title', 'Create Todo')
@section('content')
<div class="container" id="create-todo">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card content-card">
                <div class="content-header d-flex justify-content-between align-content-center">
                    <h2 class="content-title">{{ __('Create Todo') }}</h2>
                    <a href="{{ url('/') }}" class="btn btn-sm btn-secondary">Go back</a>
                </div>

                <div class="card-body">
                    <form id="todo-form">
                        <div class="form-group mb-3">
                            <label for="title">Todo Title*</label>
                            <input type="text" class="form-control" name="title" required/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description*</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="form-group mb-5">
                            <label for="due_date">Due Date*</label>
                            <input type="datetime-local" class="form-control" name="due_date" required/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Create Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.app')
@section('title', 'Edit Todo')
@section('content')
<div class="container">
    <div class="row justify-content-center" id="edit-todo-view" data-todo-id={{ $id }}>
        <div class="col-md-9">
            <div class="card content-card">
                <div class="content-header d-flex justify-content-between align-content-center">
                    <h2 class="content-title">{{ __('Edit Todo') }}</h2>
                    <a href="{{ url('/') }}" class="btn btn-sm btn-secondary">Go back</a>
                </div>

                <div class="card-body">
                    @include('partials.messages')
                    <form id="todo-form">

                        <div class="form-group mb-3">
                            <label for="title">Todo Title*</label>
                            <input type="text" class="form-control" name="title" required/>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description*</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="due_date">Due Date*</label>
                            <input type="datetime-local" class="form-control" name="due_date" required/>
                        </div>

                        <div class="form-group mb-5">
                            <label for="status">Status*</label>
                            <select name="status" class="form-control" required>
                                <option value="PENDING">PENDING</option>
                                <option value="IN PROGRESS">IN PROGRESS</option>
                                <option value="COMPLETED">COMPLETED</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Update Todo</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
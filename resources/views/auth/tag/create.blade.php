@extends('layouts.admin')
@section('title', 'Create Tag')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Create New Tag</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('auth.tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="font-weight-bold">Tag Name</label>
                            <input type="text" name="name" id="name" class="form-control" required maxlength="100" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug" class="font-weight-bold">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required maxlength="100" value="{{ old('slug') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" maxlength="255">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">Create Tag</button>
                            <a href="{{ route('auth.tags.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

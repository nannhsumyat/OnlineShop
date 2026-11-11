@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-4">
            <h1 class="mt-4 d-inline">Categories</h1>
                <a href="{{route('backend.categories.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.categories.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Category Create</li>
        </ol>
                        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Categories list
            </div>
            <div class="card-body">
                <form action="{{route('backend.categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{old('image')}}">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
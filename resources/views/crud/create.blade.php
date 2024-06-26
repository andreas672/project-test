@extends('layouts.layout')
@section('title', 'Create Memo')
@section('content')

<div class="container my-2">
    <div class="shadow p-2">
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <a href="{{ route('home') }}" class="btn btn-danger mb-3">Go Back</a>
        <div class="my-3">
            <h1 class="text-center display-6">Create Notes</h1>
            <form action="" method="POST">
                @csrf
                <div class="form-row mt-5">
                    <div class="col-md-3 ">
                        <div class="form-group">
                            <label for="title" class="font-weight-bold">Notes Title</label>
                            <input type="text" name="title" class="form-control border-success" id="title">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Notes Description</label>
                            <input type="text" name="description" class="form-control border-success" id="description">
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="text" class="font-weight-bold">NOTE</label>
                            <textarea class="form-control" name="text" id="summernote"></textarea>
                            @error('text')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
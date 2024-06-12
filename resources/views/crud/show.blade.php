@extends('layouts.layout')

@section('title', 'Your memo')

@section('content')

<div class="container my-5">
    <div class="card shadow py-4 px-5">
        <div class="mb-3">
            <a href="{{ route('home') }}" class="btn btn-danger">Go Back</a>
        </div>
        <div class="text-center mb-4">
            <h1 class="display-5 font-weight-bold">{{ $notes->title }}</h1>
        </div>
        <div class="mb-4">
            <label for="description" class="font-weight-bold">Description</label>
            <p class="border p-3 rounded">{{ $notes->description }}</p>
        </div>
        <div class="mb-4">
            <label for="text" class="font-weight-bold">Text</label>
            <div class="border rounded" >
                <div class="border border-dark " style="min-height: 200px;">{!! $notes->text !!}</div>
            </div>
        </div>
        <div >
            <a href="{{ route('edit', ['id' => $notes->id]) }}" class="btn btn-success mt-3">Edit Notes</a>
        </div>
    </div>
</div>

@endsection

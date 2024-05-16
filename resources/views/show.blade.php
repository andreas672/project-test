@extends('layouts.layout')

@section('content')

<div class="container my-5">
    <div class="shadow py-4 px-5">
        <a href="{{ route('home') }}" class="btn btn-danger mb-3">Go Back</a>
        <div class="my-3">
            <h1 class="text-center display-4">{{ $notes->title }}</h1>
            <div class="my-4">
                <label for="description" class="font-weight-bold">Description</label>
                <p>{{ $notes->description }}</p>
            </div>
            <div class="my-2">
                <label for="memo" class="font-weight-bold">NOTES</label>
                <div class="border rounded p-3">
                    <div class="border-top border-primary pt-3">{!! $notes->text !!}</div>
                </div>
            </div>
            <a href="{{ route('edit', ['id'=>$notes->id]) }}" class="btn btn-success mt-3">Edit Notes</a>
        </div>
    </div>
</div>

@endsection
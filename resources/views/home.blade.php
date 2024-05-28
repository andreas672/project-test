@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    @if (session()->has('success'))
    <div class="alert alert-success my-5">
        {{ session('success') }}
    </div>
    @endif

    @if ($notes->isEmpty())
    <div class="d-flex justify-content-center align-items-center">
        <div class="jumbotron text-center rounded">
            <h1 class="display-6">You Don't Have notes</h1>
            <p class="lead">Create your note with one click.</p>
            <div class="card-actions">
                <a href="{{ route('create') }}">
                    <button class="btn btn-dark">Create Now</button>
                </a>
            </div>
        </div>
    </div>

    @else
    <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
        <div>
            <h1 class="h4">Your notes </h1>
        </div>
        <div>
            <a href="{{ route('create') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Note Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $index => $note)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->description }}</td>
                    <td>{{ $note->date }}</td>
                    <td>
                        <a href="{{ route('show', ['id' => $note->id]) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                    <td>
                        <a href="{{ route('edit', ['id' => $note->id]) }}" class="btn btn-success btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('delete', ['id' => $note->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
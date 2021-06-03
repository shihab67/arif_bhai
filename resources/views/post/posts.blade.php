@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end p-3">
        <a href="{{ route('create') }}" class="btn btn-primary">Create</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Session::has('warning'))
                <div class="alert alert-warning">{{ Session::get('warning') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $post->post_name }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->name }}</td>
                        <td>
                            <a href="{{ route('view', [$post->id, $post->post_name]) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('delete', $post->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('title', 'View All Post')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Post</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary float-right">Create Post</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include ('layouts.alert')
                        <table id="table-posts" class="table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Views Count</th>
                                    <th>Comments Count</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->views }} views</td>
                                        <td>{{ count($post->comments) }} comments</td>
                                        <td>
                                            @if (is_null($post->deleted_at))
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Deleted</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (is_null($post->deleted_at))
                                            <a href="{{ route('view-post', ['slug' => $post->slug]) }}" class="btn btn-sm btn-success">View</a>
                                            <a href="{{ route('posts.edit', ['slug' => $post->slug]) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('posts.delete', ['slug' => $post->slug]) }}" class="btn btn-sm btn-danger">Delete</a>
                                            @else
                                            <a href="{{ route('posts.restore', ['slug' => $post->slug]) }}" class="btn btn-sm btn-primary">Restore</a>
                                            <a href="{{ route('posts.force-delete', ['slug' => $post->slug]) }}" class="btn btn-sm btn-danger">Force Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#table-posts').DataTable();
        });
    </script>
@endsection
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
                                <a href="{{ route('posts.create') }}" class="btn btn-primary float-right">Add New Post</a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->views }} views</td>
                                        <td>{{ count($item->comments) }} comments</td>
                                        <td>
                                            <a href="{{ route('view-post', ['slug' => $item->slug]) }}" class="btn btn-sm btn-success">View</a>
                                            <a href="{{ route('posts.edit', ['slug' => $item->slug]) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('posts.delete', ['slug' => $item->slug]) }}" class="btn btn-sm btn-danger">Delete</a>
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
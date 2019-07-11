@extends('layouts.app')
@section('title', 'Homepage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <form action="" method="get">
                                    <select name="category" id="category" class="form-control">
                                        <option value="" disabled selected>Choose a category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                            <div class="col-md-6 my-2">
                                <form action="" method="get"></form>
                                    <div class="btn-group" role="group" aria-label="Search">
                                        <input name="search" type="text" class="form-control" placeholder="Type a keyword...">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @each('components.blog-card', $posts, 'data', 'components.blog-empty')
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection

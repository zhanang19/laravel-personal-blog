@extends('layouts.app')
@section('title', 'Create New Post')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Post</h4>
                    </div>
                    <div class="card-body">
                        @include ('layouts.alert')
                        <div class="row">
                            <div class="col-md-9">
                                {{ Form::open(['url' => route('posts.store'), 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                                    <div class="form-group row">
                                        {{ Form::label('title', 'Title', ['class' => 'col-md-3']) }}
                                        <div class="col-md-9">
                                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                                            @error('title')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{ Form::label('category_id', 'Category', ['class' => 'col-md-3']) }}
                                        <div class="col-md-9">
                                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                                            @error('category_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{ Form::label('content', 'Content', ['class' => 'col-md-3']) }}
                                        <div class="col-md-9">
                                            {{ Form::textarea('content', null, ['class' => 'form-control']) }}
                                            @error('content')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{ Form::label('photo', 'Photo', ['class' => 'col-md-3']) }}
                                        <div class="col-md-9">
                                            {{ Form::file('photo', ['class' => 'form-control']) }}
                                            @error('photo')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{ Form::submit('Save', ['class' => 'btn btn-primary float-right']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
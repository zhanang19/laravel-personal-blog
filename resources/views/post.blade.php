@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('storage/images/' . $post->photo) }}" alt="{{ $post->title }}">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <h4>Author: {{ $post->user->name }}</h4>
                        <h6>Category: {{ $post->category->name }}</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @each('components.comment-card', $post->comments, 'data', 'components.comment-empty')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
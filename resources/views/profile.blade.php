@extends('layouts.app')
@section('title', 'My Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-5">
                <div class="card-header">Profile</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('status-type') }}" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::model($user, ['route' => 'update-profile', 'enctype' => 'multipart/form-data', 'method' => 'patch']) }}
                        <img src="{{ asset('storage/images/' . $user->avatar) }}" class="p-3" style="width:150px;height:150px;" alt="">
                        <div class="form-group">
                            {{ Form::label('avatar', 'Change Avatar') }}
                            {{ Form::file('avatar', ['class' => 'form-control']) }}
                            @error('avatar')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}
                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('address', 'Address') }}
                            {{ Form::text('address', null, ['class' => 'form-control']) }}
                            @error('address')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'readonly']) }}
                        </div>
                        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
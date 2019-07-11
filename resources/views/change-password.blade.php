@extends('layouts.app')
@section('title', 'Change Password')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-5">
                <div class="card-header">Change Password</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-{{ session('status-type') }}" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::model($user, ['route' => 'change-password', 'method' => 'patch']) }}
                        <div class="form-group">
                            {{ Form::label('old_password', 'Old Password') }}
                            {{ Form::password('old_password', ['class' => 'form-control', 'autofocus']) }}
                            @error('old_password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('new_password', 'New Password') }}
                            {{ Form::password('new_password', ['class' => 'form-control']) }}
                            @error('new_password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('new_password_confirmation', 'New Password Confirmation') }}
                            {{ Form::password('new_password_confirmation', ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Change Password', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
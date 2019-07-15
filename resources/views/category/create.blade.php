@extends('layouts.app')
@section('title', 'Create New Category')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Category</h4>
                    </div>
                    <div class="card-body">
                        @include ('layouts.alert')
                        <div class="row">
                            <div class="col-md-9">
                                {{ Form::open(['url' => route('categories.store'), 'method' => 'post', 'id' => 'create-category']) }}
                                    <div class="form-group row">
                                        {{ Form::label('name', 'Name', ['class' => 'col-md-3']) }}
                                        <div class="col-md-9">
                                            {{ Form::text('name', null, ['class' => 'form-control']) }}
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
@section('script')
    <script>
        $(function () {
            let form = $('#create-category')
            form.on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function (response) {
                        console.log(response)
                    },
                    error: function (jqXHR) {
                        let errors = jqXHR.responseJSON.message
                        $.each(errors, function (index, value) {
                            var element = $(`:input[name="${index}"]`)
                            $(`#${index}-error`).remove()
                            element.closest('.form-group>.col-md-9').append(`<span id="${index}-error" class="text-danger error">${value[0]}</span>`)
                        });
                    }
                });
            });
        });
    </script>
@endsection
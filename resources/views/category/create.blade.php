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
                        <div id="alert"></div>
                        <div class="row">
                            <div class="col-md-9">
                                {{ Form::open(['url' => route('categories.store'), 'method' => 'post', 'id' => 'create-category']) }}
                                    <div class="form-group row">
                                        {{ Form::label('name', 'Name', ['class' => 'col-md-3']) }}
                                        <div class="col-md-9">
                                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    {{ Form::submit('Save', ['class' => 'btn btn-primary float-right', 'id' => 'submit-btn']) }}
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
            let btnSubmit = $('#submit-btn')
            let form = $('#create-category')
            form.on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    beforeSend: function () {
                        btnSubmit.attr('disabled', true)
                    },
                    success: function (response) {
                        $('#alert').html(`
                            <div class="alert alert-success" role="alert">
                                ${response.message}
                            </div>
                        `)
                    },
                    error: function (jqXHR) {
                        let statusCode = jqXHR.status
                        if (statusCode == 422) {
                            let errors = jqXHR.responseJSON.message
                            $.each(errors, function (index, value) {
                                var element = $(`:input[name="${index}"]`)
                                $(`#${index}-error`).remove()
                                element.closest('.form-group>.col-md-9').append(`
                                    <span id="${index}-error" class="text-danger error">
                                        ${value[0]}
                                    </span>
                                `)
                            });
                        } else {
                            $('#alert').html(`
                                <div class="alert alert-danger" role="alert">
                                    Something was wrong. Please tryagain later.
                                </div>
                            `)
                        }
                    },
                    complete: function () {
                        btnSubmit.attr('disabled', false)
                    }
                });
            });
        });
    </script>
@endsection
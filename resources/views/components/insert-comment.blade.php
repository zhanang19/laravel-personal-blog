<div class="col-md-12 my-3">
    <div class="card">
        <div class="card-body p-3 pb-0">
            <div class="row">
                <div class="col-md-12">
                    @guest
                    <h5>Please {{ link_to_route('login', 'Login') }} first to create a comment.</h5>
                    @else
                    {{ Form::open(['url' => route('add-comment', ['slug' => $post->slug]), 'method' => 'post']) }}
                        <div class="form-row align-items-center">
                            <div class="col-sm-3 my-1">
                                {{ Form::label('comment', 'Your Comment') }}
                            </div>
                            <div class="col-sm-8 my-1">
                                {{ Form::text('comment', null, ['class' => 'form-control']) }}
                                @error('comment')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-auto">
                                {{ Form::submit('Send', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
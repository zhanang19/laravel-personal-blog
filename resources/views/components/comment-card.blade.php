<div class="col-md-12 my-3">
    <div class="card">
        <div class="card-body p-3 pb-0">
            <div class="row">
                <div class="col-sm-1 text-center">
                    <img src="{{ asset('storage/images/' . $data->user->avatar) }}" alt="." style="width:30px;height:30px;">
                </div>
                <div class="col-sm-11">
                    <h6>{{ $data->user->name }}</h6>
                    <div>{{ $data->content }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
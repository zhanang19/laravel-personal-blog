<div class="col-md-4 my-3">
    <div class="card text-center">
        <div class="card-header">
            <h4>{{ \Str::limit($data->title, 25) }}</h4>
            <span class="badge badge-primary">{{ $data->category->name }}</span>
        </div>
        <div class="card-body">
            <img class="img-fluid" style="max-height:200px" src="{{ asset('storage/images/' . $data->photo) }}" alt="">
        </div>
        <div class="card-footer">
            <a href="{{ url('/post/' . $data->slug) }}" class="btn btn-primary">More Detail</a>
        </div>
    </div>
</div>
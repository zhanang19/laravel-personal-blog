@if (session('status'))
    <div class="alert alert-{{ session('status-type') }}" role="alert">
        {{ session('status') }}
    </div>
@endif
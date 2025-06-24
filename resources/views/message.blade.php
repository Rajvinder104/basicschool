@if (!empty(session('success')))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (!empty(session('danger')))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
@if (!empty(session('info')))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
@if (!empty(session('warning')))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif
@if (!empty(session('primary')))
    <div class="alert alert-primary">
        {{ session('primary') }}
    </div>
@endif

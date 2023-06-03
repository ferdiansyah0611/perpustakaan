@if (session()->has('errors'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> 
                <ul>
                    @foreach(session('errors')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if (session()->has('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
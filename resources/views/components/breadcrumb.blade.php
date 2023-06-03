<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ $title }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    @foreach ($links as $link)
                        @if ($loop->last)
                            <li class="breadcrumb-item active">{{ $link['name'] }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ $link['url'] }}">{{ $link['name'] }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<x-alert/>
@extends('layouts.app')

{{-- @section('sidebar')
    @parent
    @include('menus.sidebar')
@endsection --}}

@section('content')

<div class="row my-5">
    <div class="col-12">
        <!-- Video main feed -->
        <div class="rounded py-4 py-sm-5 overflow-hidden position-relative"
            style="background-image:url({{ asseT('ui/assets/images/post/16by9/big/02.jpg') }}); background-position: center center; background-size: cover; background-repeat: no-repeat;">
            <div class="bg-overlay bg-dark opacity-5"></div>
            <div class="p-4 p-sm-5 position-relative">
                <div class="d-flex align-items-center mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xxs me-2">
                        <img class="avatar-img rounded-circle"
                            src="{{ asset('ui/assets/images/avatar/01.jpg') }}" alt="">
                    </div>
                    <!-- Avatar name -->
                    <h6 class="mb-0"> <a class="text-white" href="#!"> Frances Guerrero
                        </a> </h6>
                    <span class="ms-1 ms-sm-3 small text-white"> 156.9K views</span>
                </div>
                <h1 class="text-white">How does the stock market work?</h1>
                <p class="text-white">Suspicion neglected he resolving agreement perceived at an.
                </p>
                <a class="btn btn-primary stretched-link" href="video-details.html"> <i
                        class="bi bi-file-earmark-play pe-1"></i>Watch now</a>
            </div>
        </div>
        <!-- Video main END -->
    </div>
</div>
@endsection
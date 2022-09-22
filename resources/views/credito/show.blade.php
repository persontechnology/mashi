@extends('layouts.app')

{{-- @section('sidebar')
    @parent
    @include('menus.sidebar')
@endsection --}}

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header py-3 border-0 d-flex align-items-center justify-content-between">
            <h1 class="h5 mb-0">ESTADO: {{ $credito->estado }}</h1>

            <!-- Notification action START -->
            <div class="dropdown">
                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardNotiAction" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots"></i>
                </a>
                <!-- Card share action dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction">
                  <li><a class="dropdown-item" target="_blanck" href="{{ route('credito.pdf',$credito->id) }}"> <i class="bi bi-filetype-pdf fa-fw pe-2"></i>PDF</a></li>
                </ul>
              </div>
              <!-- Notification action END -->
            
        </div>
        <div class="card-body">
            @include('credito.tabla',['credito'=>$credito])
        </div>
    </div>
</div>
@endsection
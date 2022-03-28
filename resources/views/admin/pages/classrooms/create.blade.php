@extends('admin.layouts.app')

@section('title', 'New Classroom')
    
@section('link')
    <a href="{{ route('admin.classrooms') }}" class="btn btn-sm btn-outline-dark">
        <span class="material-icons mr-1">
            arrow_back
        </span>
        Return
    </a>
@endsection

@section('content')
    <div class="container page__container p-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-32pt">
                    <div class="col-lg-4">
                        <div class="page-separator">
                            <div class="page-separator__text">Default Forms</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0 text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Cum necessitatibus dolorum laborum quo quidem, mollitia harum quia, 
                            at expedita reprehenderit maxime eos ipsam quod laudantium.
                        </p>
                    </div>
                    <div class="col-lg-7 d-flex align-items-center offset-lg-1">
                        <div class="flex" style="max-width: 100%">
                            <create-classroom></create-classroom>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

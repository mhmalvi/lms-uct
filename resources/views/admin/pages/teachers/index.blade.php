@extends('admin.layouts.app')

@section("title", "Teachers List")

@section('breadcrumb')
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left px-5">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">
                    Teachers List
                </h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item">
                        <a href="">Home</a>
                    </li>
                    @if (request()->segment(1))
                        <li class="breadcrumb-item">
                            {{Str::upper(request()->segment(1))}}
                        </li>
                    @endif
                    @if (request()->segment(2))
                        <li class="breadcrumb-item">
                            {{Str::upper(request()->segment(2))}}
                        </li>
                    @endif
                    @if (request()->segment(3))
                        <li class="breadcrumb-item">
                            {{Str::upper(request()->segment(3))}}
                        </li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container page__container">
        <div class="row">
            <div class="col-md-12">
                <teachers-list />
            </div>
        </div>
    </div>
@endsection

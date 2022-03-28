@extends('admin.layouts.app')

@section("title", "Create News & Notices")

@section('link')
    <a href="{{ route('admin.news_and_notices.index') }}" class="btn btn-sm btn-outline-dark">
        <span class="material-icons mr-1">
            arrow_back
        </span>
        Return
    </a>
@endsection

@section('content')
    <div class="container page__container">
        <div class="row">
            <div class="col-md-12">
                <create-news-notice-component />
            </div>
        </div>
    </div>
@endsection

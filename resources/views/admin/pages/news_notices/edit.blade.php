@extends('admin.layouts.app')

@section("title", "Edit News & Notices")

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
                <edit-news-notice-component data="{{ $news_notice }}" />
            </div>
        </div>
    </div>
@endsection

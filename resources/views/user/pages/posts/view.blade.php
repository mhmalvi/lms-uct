@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <view-post-component post_data="{{ json_encode($post) }}" />
@endsection

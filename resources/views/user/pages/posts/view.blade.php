@extends('layouts.app')

@section('title', 'Classroom post')

@section('content')
    <view-post-component post_data="{{ json_encode($post) }}" />
@endsection

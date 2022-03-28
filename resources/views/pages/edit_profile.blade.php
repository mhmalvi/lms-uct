@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <user-edit-profile user_data="{{ json_encode($user) }}" />
@endsection

@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container page__container">
        <user-edit-profile user_data="{{ json_encode($user) }}" />
    </div>
@endsection

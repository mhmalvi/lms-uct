@extends('admin.layouts.app')

@section('content')
    <div class="container page__container">
        <classroom-view classroom_data="{{ json_encode($classroom) }}" />
    </div>
@endsection

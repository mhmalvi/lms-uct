@extends('layouts.guest')
@section('content')
<div class="container mt-4">
   <div class="row">
       <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="alert alert-soft-success d-flex"
                role="alert">
                <i class="material-icons mr-12pt">check_circle</i>
                <div class="text-body">
                    Thank you for your payment! One of our consultant will contact you soon!
                </div>
            </div>
           <div class="text-center">
               <img src="{{asset('images/done.png')}}" alt="" class="img-fluid">
               <a href="{{route('learnque')}}">Back To Home</a>
           </div>
       </div>
   </div> 
</div>
@endsection
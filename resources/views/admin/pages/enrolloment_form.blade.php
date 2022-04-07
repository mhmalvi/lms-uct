@extends('admin.layouts.app')

@section('title', "Enrollment Form")

@section('content')
    <div class="container-fluid page__container p-5">
        <div class="col-md-12">
            <table class="table table-condensend">
               <thead>
                   <tr>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Phone</th>
                       <th>Address</th>
                       <th>Download PDF</th>
                   </tr>
               </thead>
               <tbody>
                @foreach ($enrollments as $item)
                @php
                 $formData = json_decode(json_encode($item->form_data, true));  
                 $formObject = json_decode($formData);
                @endphp
                   <tr>
                       <td>{{$formObject->name}}</td>
                       <td>{{$formObject->email}}</td>
                       <td>{{$formObject->phone}}</td>
                       <td>{{$formObject->address}}</td>
                       <td><a href="/generate-pdf/{{$item->id}}"><i class="bi bi-filetype-pdf"></i></a></td>
                   </tr>
                @endforeach
               </tbody>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .bi-filetype-pdf{
            font-size: 35px;
            color: green;
        }
    </style>
@endpush

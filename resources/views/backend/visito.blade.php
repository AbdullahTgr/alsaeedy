@extends('backend.layouts.master')
 


@section('title',"Lang::get('msg.Alsaidi')")
@section('main-content')
<div class="container-fluid"> 
    @include('backend.layouts.notification')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">النقرات</h1>
    </div>

    <div class="card shadow mb-4">
      <div class="row">
          <div class="col-md-12">
             @include('backend.layouts.notification')
          </div>
      </div>

      
     <div class="card-body">



@if (isset($sp))
    @include('backend.sp_country')
@else
@include('backend.countries')
@endif



 
@include('frontend.videopar_admin') 
 @include('frontend.hotposts_admin')












    
@endsection

@push('scripts')


@endpush
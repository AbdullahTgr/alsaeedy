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
       <div class="table-responsive">
         <table class="table table-bordered" id="click-dataTable" width="100%" cellspacing="0">
           <thead>
             <tr>
              <th>S.N.</th>
              <th>فيديو او مقال</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>التاريخ</th>
             </tr>
           </thead>
           <tfoot>
             <tr>
              <th>S.N.</th>
              <th>فيديو او مقال</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>S.N.</th>
              <th>التاريخ</th>
               </tr>
           </tfoot>
           <tbody>
             @foreach($clicks as $click)   
                 <tr>
                  <td>{{$click->id}}</td>
                  <td>{{$click->post_or_vid}}</td>
                  <td>{{$click->prop1}}</td>
                  <td>{{$click->prop2}}</td>
                  <td>{{$click->prop3}}</td>
                  <td>{{$click->prop4}}</td>
                  <td>{{$click->prop5}}</td>
                  <td>{{$click->prop6}}</td>
                  <td>{{$click->prop7}}</td>
                  <td>{{$click->prop8}}</td>
                  <td>{{$click->prop9}}</td>
                  <td>{{$click->prop10}}</td>
                  <td>{{$click->created_at}}</td>
                     
                 </tr>  
             @endforeach
           </tbody>
         </table>
         
       </div>
     </div>
 </div>
















    
@endsection

@push('scripts')


@endpush
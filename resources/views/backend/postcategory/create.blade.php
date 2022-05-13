@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Post Category</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-category.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">اسم الفئة</label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="اسم الفئة لنشر البوست بالفرنسي"  value="{{old('title-ar')}}" class="form-control">
          @error('title-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-xs-12 " style="background:#ddd">
  
  <div class="form-group">
    <label for="inputTitle-fr" class="col-form-label">اسم الفئة</label>
    <input id="inputTitle-fr" type="text" name="title-fr" placeholder="اسم الفئة لنشر البوست"  value="{{old('title-fr')}}" class="form-control">
    @error('title-fr')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>  


        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Post Category</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-category.update',$postCategory->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$postCategory->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">اسم الفئة</label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="اسم الفئة لنشر البوست"  value="{{$postCategory->{'title-ar'} }}" class="form-control">
          @error('title-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-xs-12 " style="background:#ddd">
  
  <div class="form-group">
    <label for="inputTitle-fr" class="col-form-label">اسم الفئة بالفرنسي</label>
    <input id="inputTitle-fr" type="text" name="title-fr" placeholder="اسم الفئة لنشر البوست"  value="{{$postCategory->{'title-fr'} }}" class="form-control">
    @error('title-fr')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>  

 
        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control">
            <option value="active" {{(($postCategory->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($postCategory->status=='inactive') ? 'selected' : '')}}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

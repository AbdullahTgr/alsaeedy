@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit video Category</h5>
    <div class="card-body">
      <form method="post" action="{{route('video-maincategory.update',$videomaincategories->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">اسم الشخص</label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="اسم الشخص"  value="{{$videomaincategories->{'title-ar'} }}" class="form-control">
          @error('title-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">تفاصيل</label>
          <input id="inputTitle" type="text" name="title" placeholder="تفاصيل"  value="{{$videomaincategories->{'title'} }}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-xs-12 " style="background:#ddd">
  
  <div class="form-group">
    <label for="inputTitle-fr" class="col-form-label"></label>
    <input id="inputTitle-fr" type="text" name="title-fr" placeholder="رابط صورة"  value="{{$videomaincategories->{'title-fr'} }}" class="form-control">
    @error('title-fr')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>  

 
        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control">
            <option value="active" {{(($videomaincategories->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($videomaincategories->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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


@extends('backend.layouts.master')
@section('title',Lang::get('msg.Alsaidi'))
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Brand</h5>
    <div class="card-body">
      <form method="post" action="{{route('brand.update',$brand->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$brand->title}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>  
        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">البراند <span class="text-danger">*</span></label>
        <input id="inputTitle-ar" type="text" name="title-ar" placeholder="ايم البراند"  value="{{$brand->{'title-ar'} }}" class="form-control">
        @error('title-ar')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>   
        
        

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-xs-12 " style="background:#ddd">
  
  <div class="form-group">
    <label for="inputTitle-fr" class="col-form-label">البراند بالفرنسي<span class="text-danger">*</span></label>
  <input id="inputTitle-fr" type="text" name="title-fr" placeholder="اسم البراند"  value="{{$brand->{'title-fr'} }}" class="form-control">
  @error('title-fr')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>  
</div>  

        
        

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($brand->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($brand->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
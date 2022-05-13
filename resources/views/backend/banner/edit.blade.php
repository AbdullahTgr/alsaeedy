@extends('backend.layouts.master')
@section('title',Lang::get('msg.Alsaidi'))
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Banner</h5>
    <div class="card-body">
      <form method="post" action="{{route('banner.update',$banner->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$banner->title}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputDesc" class="col-form-label">Description</label>
          <textarea class="form-control" id="description" name="description">{{$banner->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        
        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">العنوان علي الصورة (البانر )  <span class="text-danger">*</span></label>
        <input id="inputTitle-ar" type="text" name="title-ar" placeholder="Enter title"  value="{{$banner->{'title-ar'} }}" class="form-control">
        @error('title-ar')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputDesc-ar" class="col-form-label">التفاصيل تحت العنوان</label>
          <textarea class="form-control" id="description-ar" name="description-ar">{{$banner->{'description-ar'} }}</textarea>
          @error('description-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-xs-12 " style="background:#ddd">
  <div class="form-group">
    <label for="inputTitle-fr" class="col-form-label">العنوان علي الصورة (البانر )  بالفرنسي<span class="text-danger">*</span></label>
  <input id="inputTitle-fr" type="text" name="title-fr" placeholder="Enter title"  value="{{$banner->{'title-fr'} }}" class="form-control">
  @error('title-fr')
  <span class="text-danger">{{$message}}</span>
  @enderror
  </div>

  <div class="form-group">
    <label for="inputDesc-fr" class="col-form-label">التفاصيل تحت العنوان بالفرنسي</label>
    <textarea class="form-control" id="description-fr" name="description-fr">{{$banner->{'description-fr'} }}</textarea>
    @error('description-fr')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>  


        <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($banner->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($banner->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
    $(document).ready(function() {
    $('#description-ar').summernote({
      placeholder: "التفاصيل",
        tabsize: 2,
        height: 150
    });
    });
    $(document).ready(function() {
    $('#description-fr').summernote({
      placeholder: "التفاصيل",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
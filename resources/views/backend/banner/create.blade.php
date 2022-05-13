@extends('backend.layouts.master')

@section('title',config('app.nameeng'))

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Banner</h5>
    <div class="card-body">
      <form method="post" action="{{route('banner.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputDesc" class="col-form-label">Description</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        
<div class="form-group">
  <label for="inputTitle-ar" class="col-form-label">العنوان علي البانر <span class="text-danger">*</span></label>
<input id="inputTitle-ar" type="text" name="title-ar" placeholder="العنوان علي البانر"  value="{{old('title-ar')}}" class="form-control">
@error('title-ar')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
  <label for="inputDesc-ar" class="col-form-label">التفاصيل تحت العنوان</label>
  <textarea class="form-control" id="description-ar" name="description-ar">{{old('description-ar')}}</textarea>
  @error('description-ar')
  <span class="text-danger">{{$message}}</span>
  @enderror
</div>


<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-xs-12 " style="background:#ddd">
<div class="form-group">
  <label for="inputTitle-fr" class="col-form-label">العنوان بالفرنسية علي البانر <span class="text-danger">*</span></label>
<input id="inputTitle-fr" type="text" name="title-fr" placeholder="العنوان بالفرنسية علي البانر"  value="{{old('title-fr')}}" class="form-control">
@error('title-fr')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
  <label for="inputDesc-fr" class="col-form-label">التفاصيل تحت العنوان</label>
  <textarea class="form-control" id="description-fr" name="description-fr">{{old('description-fr')}}</textarea>
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
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
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
@extends('backend.layouts.master')
@section('title',Lang::get('msg.Alsaidi'))
@section('main-content')

<div class="card">
    <h5 class="card-header">Add Brand</h5>
    <div class="card-body">
      <form method="post" action="{{route('brand.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        
        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">البراند <span class="text-danger">*</span></label>
        <input id="inputTitle-ar" type="text" name="title-ar" placeholder="اسم البراند"  value="{{old('title-ar')}}" class="form-control">
        @error('title-ar')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        
        <div class="form-group">
          <label for="inputTitle-fr" class="col-form-label">البراند بالفرنسي<span class="text-danger">*</span></label>
        <input id="inputTitle-fr" type="text" name="title-fr" placeholder="اسم البراند بالفرنسي"  value="{{old('title-fr')}}" class="form-control">
        @error('title-fr')
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
</script>
@endpush
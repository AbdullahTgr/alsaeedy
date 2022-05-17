@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Post</h5>
    <div class="card-body">
        @if (Auth::user()->role=='admin')
      <form method="post" action="{{route('post.store')}}"> 

        @else   
        <form method="post" action="{{route('post_m.store')}}"> 
 
    @endif
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="quote" class="col-form-label">Quote</label>
          <textarea class="form-control" id="quote" name="quote">{{old('quote')}}</textarea>
          @error('quote')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div> 

        <div class="form-group">
          <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Description</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>











        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">عنوان المنشور <span class="text-danger">*</span></label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="عنوان المنشور"  value="{{old('title-ar')}}" class="form-control">
          @error('title-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="quote-ar" class="col-form-label">مقتبس</label>
          <textarea class="form-control" id="quote-ar" name="quote-ar">{{old('quote-ar')}}</textarea>
          @error('quote-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary-ar" class="col-form-label">ملخص <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary-ar" name="summary-ar">{{old('summary-ar')}}</textarea>
          @error('summary-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description-ar" class="col-form-label">تفاصيل </label>
          <textarea class="form-control" id="description-ar" name="description-ar">{{old('description-ar')}}</textarea>
          @error('description-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>





<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="col-xs-12 " style="background:#ddd">
  


  <div class="form-group">
    <label for="inputTitle-fr" class="col-form-label">عنوان المنشور بالفرنسي <span class="text-danger">*</span></label>
    <input id="inputTitle-fr" type="text" name="title-fr" placeholder="عنوان المنشور"  value="{{old('title-fr')}}" class="form-control">
    @error('title-fr')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="quote-fr" class="col-form-label">مقتبس بالفرنسي</label>
    <textarea class="form-control" id="quote-fr" name="quote-fr">{{old('quote-fr')}}</textarea>
    @error('quote-fr')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="summary-fr" class="col-form-label">ملخص بالفرنسي<span class="text-danger">*</span></label>
    <textarea class="form-control" id="summary-fr" name="summary-fr">{{old('summary-fr')}}</textarea>
    @error('summary-fr')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="description-fr" class="col-form-label"> تفاصيل بالفرنسي </label>
    <textarea class="form-control" id="description-fr" name="description-fr">{{old('description-fr')}}</textarea>
    @error('description-fr')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>  





        <div class="form-group">
          <label for="post_cat_id">Category <span class="text-danger">*</span></label>
          <select name="post_cat_id" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($categories as $key=>$data)
                  <option value='{{$data->id}}'>{{$data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="tags">Tag</label>
          <select name="tags[]" multiple  data-live-search="true" class="form-control selectpicker">
              <option value="">--Select any tag--</option>
              @foreach($tags as $key=>$data)
                  <option value='{{$data->title}}'>{{$data->title}}</option>
              @endforeach
          </select>
        </div>
@if (Auth::user()->role=='admin')
   
        <div class="form-group">
          <label for="added_by">Author</label>
          <select name="added_by" class="form-control">
              <option value="">--Select any one--</option>
              @foreach($users as $key=>$data)
                <option value='{{$data->id}}' {{($key==0) ? 'selected' : ''}}>{{$data->name}}</option>
            @endforeach
          </select>
        </div>
@endif

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write detail Quote.....",
          tabsize: 2,
          height: 100
      });
    });

    
    $(document).ready(function() {
      $('#summary-ar').summernote({
        placeholder: "وصق مختصر",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description-ar').summernote({
        placeholder: "وصف مفصل",
          tabsize: 2,
          height: 150
      });
    });

    $(document).ready(function() {
      $('#quote-fr').summernote({
        placeholder: "اكتب مقتبس بالفرنسي",
          tabsize: 2,
          height: 100
      });
    });
    
    $(document).ready(function() {
      $('#summary-fr').summernote({
        placeholder: "وصق مختصر بالفرنسي",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description-fr').summernote({
        placeholder: "وصف مفصل بالفرنسي",
          tabsize: 2,
          height: 150
      });
    });

    $(document).ready(function() {
      $('#quote-fr').summernote({
        placeholder: "اكتب مقتبس بالفرنسي",
          tabsize: 2,
          height: 100
      });
    });
    // $('select').selectpicker();

</script>
@endpush
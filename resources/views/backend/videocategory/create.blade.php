@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">اسم القناة</h5>
    <div class="card-body">
      <form method="post" action="{{route('video-category.store')}}"> 
        {{csrf_field()}}

        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">اسم الفئة</label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="اسم القناة"  value="{{old('title-ar')}}" class="form-control">
          @error('title-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>











        <div class="form-group">
          <label for="inputTitle" class="col-form-label">تفاصيل</label>
          <input id="inputTitle" type="text" name="title" placeholder="تفاصيل"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        


        
        
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="title-fr" value="{{old('photo')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


       

        <div class="form-group">
          <label for="video_cat_id">اختر الشخص التابع لتلك القناة <span class="text-danger">*</span></label>
          <select name="video_maincat_id" class="form-control">
              <option value="">--اختر الشخص التابع لتلك القناة--</option>
              @foreach($videocategory as $key=>$data)  
                  <option value='{{$data->id}}'>{{ $data->{'title-ar'} }}</option>
              @endforeach
          </select>
        </div>
        

        <div class="form-group">
          <label for="status" class="col-form-label">الحالة</label>
          <select name="status" class="form-control">
              <option value="active">نشط</option>
              <option value="inactive">غير نشط</option>
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
    $(function(){
       // DOM ready

// ::: TAGS BOX

$("#tags input").on({
  focusout : function() {
    var txt = this.value; // allowed characters .replace(/[^a-z0-9\+\-\.\#]/ig,'')
   // if(txt) $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
    if(txt) $(this).parent("div").append('<span><input type="hidden" value="'+txt+'" name="tags[]">'+txt.toLowerCase()+'</span>');
    this.value = "";
  },
  keyup : function(ev) {
    // if: comma|enter (delimit more keyCodes with | pipe)
    if(/(188|13)/.test(ev.which)) $(this).focusout(); 
  }
});

$('#tags').on('click', 'span', function() {
  if(confirm("Remove "+ $(this).text() +"?")) $(this).remove(); 
});


});
</script>
@endpush
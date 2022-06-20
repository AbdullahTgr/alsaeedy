@extends('backend.layouts.master')
<style>
#tags{
  float:left;
  border:1px solid #ccc;
  padding:5px;
  font-family:Arial;
}
#tags > span{
  cursor:pointer;
  display:block;
  float:left;
  color:#fff;
  background:#789;
  padding:5px;
  padding-right:25px;
  margin:4px;
}
#tags > span:hover{
  opacity:0.7;
}
#tags > span:after{
 position:absolute;
 content:"×";
 border:1px solid;
 padding:2px 5px;
 margin-left:3px;
 font-size:11px;
}
#tags > input{
  background:#eee;
  border:0;
  margin:4px;
  padding:7px;
  width:auto;
}

</style>
@section('main-content')

<div class="card">
    <h5 class="card-header">Add video</h5>
    <div class="card-body">
        @if (Auth::user()->role=='admin')
      <form method="post" action="{{route('video.store')}}"> 

        @else   
        <form method="post" action="{{route('video_m.store')}}"> 
 
    @endif
        {{csrf_field()}}
      







        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">عنوان الفيديو <span class="text-danger">*</span></label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="عنوان المنشور"  value="{{old('title-ar')}}" class="form-control">
          @error('title-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="quote-ar" class="col-form-label">رابط الفيديو <span class="text-danger">*</span></label>
          <input id="quote-ar" type="text" name="quote-ar" placeholder="رابط الفيديو"  value="{{old('quote-ar')}}" class="form-control">
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





         <div class="form-group">
          <label for="video_cat_id">Category <span class="text-danger">*</span></label>
          <select name="video_cat_id" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($categories as $key=>$data)
                  <option value='{{$data->id}}'>{{$data->{'title-ar'}}}</option>
              @endforeach
          </select>
        </div>

        
        <div class="tagz">separete with comma ( , )</div>
        <div id="tags">
          <span>--Write any tag--</span>
          <input type="text" value=""  placeholder="Add a tag" />
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
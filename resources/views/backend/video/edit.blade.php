@extends('backend.layouts.master')
 
@section('main-content')
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
<div class="card">
    <h5 class="card-header">Edit video</h5>
    <div class="card-body"> 
     

        @if (Auth::user()->role=='admin')
        <form method="post" action="{{route('video.update',$video->id)}}">
        @else  
        <form method="post" action="{{route('video_m.update',$video->id)}}">
     @endif

        @csrf 
        @method('PATCH')

        


        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">عنوان الفيديو <span class="text-danger">*</span></label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="Enter title"  value="{{$video->{'title-ar'} }}" class="form-control">
          @error('title-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="quote-ar" class="col-form-label">رابط الفيديو</label>
          <textarea class="form-control" id="quote-ar" name="quote-ar">{{$video->{'quote-ar'} }}</textarea>
          @error('quote-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary-ar" class="col-form-label">ملخص <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary-ar" name="summary-ar">{{$video->{'summary-ar'} }}</textarea>
          @error('summary-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description-ar" class="col-form-label">تفاصيل</label>
          <textarea class="form-control" id="description-ar" name="description-ar">{{$video->{'description-ar'} }}</textarea>
          @error('description-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>




        <div class="form-group">
          <label for="video_cat_id">الفئات<span class="text-danger">*</span></label>
          <select name="video_cat_id" class="form-control" id="showmaincat" >
              <option value="{{$video->{'description-ar'} }}">--اختر فئة --</option>
              @foreach($videomaincategoryroot as $key=>$data) 
                  <option value="{{ route('maincat.get',$data->id) }}" >{{ $data->{'title-ar'} }}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="video_cat_id">الاشخاص <span class="text-danger">*</span></label>
          <select name="video_cat_id" class="form-control " id="show-maincat">
              <option value="">-- اختر شخصا--</option>
              
          </select>
        </div>

        <div class="form-group">
          <label for="video_cat_id">المحتوي <span class="text-danger">*</span></label>
          <select name="video_cat_id" class="form-control" id="show-cat">
              <option value="{{$video->{'video_cat_id'} }}">--اختر نوع المحتوي --</option>
             
          </select>
        </div>


        

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$video->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
 

 


        
        {{-- {{$video->tags}} --}}
        @php 
                $video_tags=explode(',',$video->tags);
                // dd($tags);
              @endphp
        {{-- <div class="form-group">
          <label for="tags">Tag</label>
          <select name="tags[]" multiple  data-live-search="true" class="form-control selectpicker">
              <option value="">--Select any tag--</option>
              @foreach($tags as $key=>$data)
              
              <option value="{{$data->title}}"  {{(( in_array( "$data->title",$video_tags ) ) ? 'selected' : '')}}>{{$data->title}}</option>
              @endforeach
          </select>
        </div> --}}

 
        {{-- <span><input type="hidden" value="سيسظزو" name="tags[]">سيسظزو</span> --}}


        <div class="tagz">separete with comma ( , )</div>
        <div id="tags">
          <span>--Write any tag--</span>
          @foreach($video_tags as $key=>$data)
          <span><input type="hidden" value="{{$data}}" name="tags[]">{{$data}}</span>
@endforeach
          <input type="text" value=""  placeholder="Add a tag" />
        </div>



        @if (Auth::user()->role=='admin')
   
        <div class="form-group">
          <label for="added_by">Author</label>
          <select name="added_by" class="form-control">
              <option value="">--Select any one--</option>
              @foreach($users as $key=>$data)
                <option value='{{$data->id}}' {{(($video->added_by==$data->id)? 'selected' : '')}}>{{$data->name}}</option>
              @endforeach
          </select>
        </div>
@endif





        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($video->status=='active')? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($video->status=='inactive')? 'selected' : '')}}>Inactive</option>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');



    $('body').on('click', '#showmaincat', function () {
          
          
          var userURL = $(this).val();
          
          

          $.get(userURL, function (data) {
            
      var arrr=data['data'];

      $('#show-maincat').html("");
      $('#show-cat').html("");
      arrr.forEach(myFunction);
        function myFunction(item) {
          $('#show-maincat').append('<option value="/admin/getcat/'+item['id']+'">'+item['title-ar']+'</option>')
        }
 

    
          })

       });
       






       /* When click show user */
       $('body').on('click', '#show-maincat', function () {
          
          
          var userURL = $(this).val();
          
          

          $.get(userURL, function (data) {
            
      var arrr=data['data'];

      $('#show-cat').html("");
      arrr.forEach(myFunction);
        function myFunction(item) {
          $('#show-cat').append('<option value="'+item['id']+'">'+item['title-ar']+'</option>')
        }
 

    
          })

       });










    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
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
      $('#quote-ar').summernote({
        placeholder: "اكتب مقتبس",
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
</script>
@endpush
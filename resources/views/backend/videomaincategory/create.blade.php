@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add video Main Category</h5>
    <div class="card-body">
      <form method="post" action="{{route('video-maincategory.store')}}"> 
        {{csrf_field()}}

        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">اسم الفئة</label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="اسم الفئة لنشر البوست بالفرنسي"  value="{{old('title-ar')}}" class="form-control">
          @error('title-ar')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        
        <div class="form-group">
          <label for="video_cat_id">Main Category Root <span class="text-danger">*</span></label>
          <select name="video_maincatroot_id" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($maincategoryroot as $key=>$data)
                  <option value='{{$data->id}}'>{{ $data->{'title-ar'} }}</option>
              @endforeach
          </select>
        </div>



        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
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

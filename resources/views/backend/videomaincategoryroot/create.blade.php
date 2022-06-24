@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Main Category Root</h5>
    <div class="card-body">
      <form method="post" action="{{route('video-maincategoryroot.store')}}"> 
        {{csrf_field()}}

        <div class="form-group">
          <label for="inputTitle-ar" class="col-form-label">الفئة الرئيسية</label>
          <input id="inputTitle-ar" type="text" name="title-ar" placeholder="اسم الفئة الرئيسية"  value="{{old('title-ar')}}" class="form-control">
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
          <label for="inputTitle-fr" class="col-form-label"></label>
          <input id="inputTitle-fr" type="text" name="title-fr" placeholder="رابط صورة"  value="{{old('title-fr')}}" class="form-control">
          @error('title-fr')
          <span class="text-danger">{{$message}}</span>
          @enderror
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

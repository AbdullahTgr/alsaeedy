@extends('frontend.layouts.master')
<?php $settings=DB::table('settings')->get(); ?>
@php
$path="";    
@endphp
@foreach($settings as $data)

 @php
    $path=$data->logo
@endphp

@endforeach
                                                 
@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    
	<meta property="og:url" content="https://www.facebook.com/alsaeedyblog"> 
    <meta property="og:image"  itemprop="image"  content="{{ url('images/abdullah.png') }}" />
    <meta name="twitter:image" content="{{ url('images/abdullah.png') }}">

    


    <meta name="twitter:description" content="عبدالله مصطفي| مطور ويب | يعمل علي تطوير وانشاء المواقع الالكترونية بتقنيات تتوافق مع السيو (SEO)">

	<meta name="keywords" content="موسوعة,عربية,شاملة,السعدي,عبدالله,عبدالله مصطفي,مطور ويب,مواقع الكترونية,ويب,موقع._">
	<meta name="description" content="عبدالله مصطفي | مطور ويب | يعمل علي تطوير وانشاء المواقع الالكترونية بتقنيات تتوافق مع السيو (SEO)">
	
    <meta property="og:type" content="article" />
	<meta property="og:title" content="عبدالله مصطفي | مطور ويب"> 
	<meta property="og:description" content=" عبدالله مصطفي | مطور ويب | يعمل علي تطوير وانشاء المواقع الالكترونية بتقنيات تتوافق مع السيو (SEO)">
@endsection

@section('title',"عبدالله مصطفي")



<style>



body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
    direction: rtl;
    text-align: right;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}



</style>
@section('main-content')


        

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
     crossorigin="anonymous"></script>
<!-- respo -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5062667702348863"
     data-ad-slot="2257736673"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    <!-- Start Blog Single -->

    







    

    <div class="container">
        <div class="main-body">
        
              <!-- Breadcrumb -->
              <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">
                    
                    <h2>عبدالله مصطفي عبد السميع</h2>
                    <B>- تاريخ الميلاد 25 / 6 /1996-</B>
                    <h3>أخصائي ومطورمواقع ويب من ذوي الخبرة وله تاريخ حافل من العمل في صناعة إدارة الاعمال</h3>
                    <p> خبير في تصميم بطريقة ال SEO واللتي تحسن نتائج موقعك الالكتروني في الظهور في محركات البحث - تخرج من جامعة 6 اكتوبر قسم علوم الحاسب - له العديد من المشاريع القائمة في مجال الويب -المنشئ لمدونة السعدي الالكترونية – وجعلها تتصدر المرتبة الاولي في نتائج بحث جوجل في اقل من 30 يوما - يعمل بلغات برمجة المواقع (Html, Css , Javascript , JQuery, Ajax , LiveWire , Bootstrap , Php Native , Laravel Framework, React js ,wordpress , SEO (Professional)</p>
                    
   
                    
                
                </a></li>
                </ol>
              </nav>
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ url('images/abdullah.png') }}" alt="عبدالله مصطفي" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h3>عبدالله</h3>
                          <p class="text-secondary mb-1">عبدالله مصطفي | مطور ويب</p>
                          <p class="text-muted font-size-sm">الجيزة | 6اكتوبر</p>
                          <button class="btn btn-primary">تابع</button>
                          <button class="btn btn-outline-primary">رسالة</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>موقع الكتروني</h6>
                        <span class="text-secondary">https://spandevelopers.com</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                        <span class="text-secondary">https://github.com/AbdullahTgr</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>لينكد ان</h6>
                        <span class="text-secondary">https://www.linkedin.com/in/abdullah-mostafa-6211a8154</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>انستجرام</h6>
                        <span class="text-secondary">https://www.instagram.com/spandevelopers</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>فيس بوك</h6>
                        <span class="text-secondary">https://www.facebook.com/spansoftware</span>
                      </li>
                    </ul>

<B
style="

font-size: 25px;
    height: 50px;
    padding: 10px;
    text-align: center;
    color: var(--blue);
    background: #ddd;
"


>الاعمال</B>
                    
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">موقع النماء</h6>
                          <span class="text-secondary">https://al-namapacking.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">مدونة السعدي</h6>
                          <span class="text-secondary">https://alsaeedy.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">الصعيدي</h6>
                          <span class="text-secondary">https://alsaidyforinvestments.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <h6 class="mb-0">شركة البدر</h6>
                          <span class="text-secondary">https://elbadrstore.com</span>
                        </li>

                        
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">انوفاشن</h6>
                            <span class="text-secondary">https://ieisco.com</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">ماركي</h6>
                            <span class="text-secondary">https://markey.sa</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">مالتي مانجمنت</h6>
                            <span class="text-secondary">https://multimanagement-eg.com</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">سبان لتطوير المواقع الالكترونية</h6>
                            <span class="text-secondary">https://spandevelopers.com/</span>
                          </li>


                      </ul>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">الاسم بالكامل</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          عبدالله مصطفي عبد السميع
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">الايميل</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          abdullah@spandevelopers.com
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">التيليفون</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          (+002) 010 02449142
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">هاتف</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          (+002) 010 24977939
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">العنوان</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           السادس من اكتوبر - دجلة بالمز
                        </div>
                      </div>
                      <hr>
                      
                    </div>
                  </div>
    
                  <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"> / </i>مهارات</h6>
                          <small>HTML</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>CSS</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Javascript</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Bootstrap</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>JQuery</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>AJax</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Livewire</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                            
                          <small>PhP</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Laravel Framework</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>WordPress</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Mysql (Phpmyadmin)</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Reactjs</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Nodejs</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
    
    
                </div>
              </div>
    
            </div>
        </div>








    <!--/ End Blog Single -->
@endsection
@push('styles')
    <style>
        .pagination{
            display:inline-flex;
        }
    </style>

@endpush
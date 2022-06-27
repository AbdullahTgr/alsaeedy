<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Banner
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-image"></i>
        <span>Banners</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Banner Options:</h6>
          <a class="collapse-item" href="{{route('banner.index')}}">Banners</a>
          <a class="collapse-item" href="{{route('banner.create')}}">Add Banners</a>
        </div>
      </div>
    </li>
    <!-- Divider -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#flre" aria-expanded="true" aria-controls="flre">
        <i class="fas fa-image"></i>
        <span>مدير الملفات</span>
      </a>
      <div id="flre" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">مدير الملفات:</h6>
          <a class="collapse-item" href="{{route('file-manager')}}">مدير الملفات</a>
          
        </div>
      </div>
    </li>
    <!-- Divider -->

    
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Posts
    </div>

    <!-- Posts -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">
        <i class="fas fa-fw fa-folder"></i>
        <span>Posts</span>
      </a>
      <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Post Options:</h6>
          <a class="collapse-item" href="{{route('post.index')}}">Posts</a>
          <a class="collapse-item" href="{{route('post.create')}}">Add Post</a>
        </div>
      </div>
    </li>

     <!-- Category -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
          <i class="fas fa-sitemap fa-folder"></i>
          <span>Category</span>
        </a>
        <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{route('post-category.index')}}">Category</a>
            <a class="collapse-item" href="{{route('post-category.create')}}">Add Category</a>
          </div>
        </div>
      </li>

      <!-- Tags -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
            <i class="fas fa-tags fa-folder"></i>
            <span>Tags</span>
        </a>
        <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tag Options:</h6>
            <a class="collapse-item" href="{{route('post-tag.index')}}">Tag</a>
            <a class="collapse-item" href="{{route('post-tag.create')}}">Add Tag</a>
            </div>
        </div>
    </li>

      <!-- Comments -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>Comments</span>
        </a>
      </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
        General Settings
    </div>
 
    
     <!-- Users -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>
     <!-- General settings -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li>

    <!-- Categories -->

    
{{-- 
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#video" aria-expanded="true" aria-controls="video">
        <i class="fas fa-sitemap"></i>
        <span>Video Youtube</span>
      </a>
      <div id="video" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Channel Options:</h6>
          <a class="collapse-item" href="{{ route("admin.channels.index") }}">Channels</a>
          <a class="collapse-item" href="{{ route("admin.channels.create") }}">Add Channel</a>
        </div>
      </div>
      <div id="video" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Video Options:</h6>
          <a class="collapse-item" href="{{ route("admin.videos.index") }}">Video</a>
          <a class="collapse-item" href="{{ route("admin.videos.create") }}">Add Video</a>
        </div>
      </div>
  </li> --}}



















    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      فيديوهات
    </div>

    <!-- videos -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#videoCollapse" aria-expanded="true" aria-controls="videoCollapse">
        <i class="fas fa-fw fa-folder"></i>
        <span>فيديو</span>
      </a>
      <div id="videoCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">خيارات:</h6>
          <a class="collapse-item" href="{{route('video.index')}}">جميع الفيديوهات</a>
          <a class="collapse-item" href="{{route('video.create')}}">اضف فيديو</a>
        </div>
      </div>
    </li>

    <!-- Main Category -->
    <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#videoMainCategoryrootCollapse" aria-expanded="true" aria-controls="videoMainCategoryrootCollapse">
       <i class="fas fa-sitemap fa-folder"></i>
       <span>الفئات الرئيسة</span>
     </a>
     <div id="videoMainCategoryrootCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">الفئات الرئيسة</h6>
         <a class="collapse-item" href="{{route('video-maincategoryroot.index')}}">الفئات الرئيسة</a>
         <a class="collapse-item" href="{{route('video-maincategoryroot.create')}}">اضف فئة</a>
       </div>
     </div>
   </li>

   <!-- Main Category -->
   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#videoMainCategoryCollapse" aria-expanded="true" aria-controls="videoMainCategoryCollapse">
      <i class="fas fa-sitemap fa-folder"></i>
      <span>الاشخاص</span>
    </a>
    <div id="videoMainCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">الاشخاص</h6>
        <a class="collapse-item" href="{{route('video-maincategory.index')}}">جميع الاشخاص</a>
        <a class="collapse-item" href="{{route('video-maincategory.create')}}">اضف شخص </a>
      </div>
    </div>
  </li>
    <!-- Category -->
    <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#videoCategoryCollapse" aria-expanded="true" aria-controls="videoCategoryCollapse">
         <i class="fas fa-sitemap fa-folder"></i>
         <span>القنوات</span>
       </a>
       <div id="videoCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">القنوات</h6>
           <a class="collapse-item" href="{{route('video-category.index')}}">القنوات</a>
           <a class="collapse-item" href="{{route('video-category.create')}}">اضف قناة</a>
         </div>
       </div>
     </li>

      <!-- Tags -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
            <i class="fas fa-tags fa-folder"></i>
            <span>Tags</span>
        </a>
        <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tag Options:</h6>
            <a class="collapse-item" href="{{route('video-tag.index')}}">Tag</a>
            <a class="collapse-item" href="{{route('video-tag.create')}}">Add Tag</a>
            </div>
        </div>
    </li>

      <!-- Comments -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>Comments</span>
        </a>
      </li>



















    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


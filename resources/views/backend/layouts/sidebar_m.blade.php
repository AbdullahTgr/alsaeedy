<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Moderator</div>
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
        <a class="collapse-item" href="{{route('post_m.index')}}">Posts</a>
        <a class="collapse-item" href="{{route('post_m.create')}}">Add Post</a> 
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
<!doctype html>
<html lang="en">
  <head>
    @include('admin.components.topscript')
  </head>
  <body class="vertical light  ">
    <div class="wrapper">
      @include('admin.layouts.components.navbar')
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        @include('admin.layouts.components.sidebar')
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              
              @yield('content')
              
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->    
    <!-- Topscript -->
    @include('admin.components.bottomscript')

  </body>
</html>
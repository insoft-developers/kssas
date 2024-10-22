<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('template/frontend/images/user') }}/{{ Auth::user()->profile_image }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="active">
          <a href="{{ url('/backoffice') }}">
            <i class="fa fa-home"></i> <span>Home</span>
            
          </a>
         
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('slider') }}"><i class="fa fa-circle-o"></i> Slider</a></li>
            <li><a href="{{ url('topic') }}"><i class="fa fa-circle-o"></i> Topik Utama </a></li>
            <li><a href="{{ url('benefit') }}"><i class="fa fa-circle-o"></i> Keuntungan Anggota </a></li>
            <li><a href="{{ url('staff') }}"><i class="fa fa-circle-o"></i> Staff & Pengurus </a></li>
            <li><a href="{{ url('mitra') }}"><i class="fa fa-circle-o"></i> Mitra </a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Tentang Kami</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('backabout') }}"><i class="fa fa-circle-o"></i> About </a></li>
            <li><a href="{{ url('video') }}"><i class="fa fa-circle-o"></i> Video </a></li>
            <li><a href="{{ url('rapat') }}"><i class="fa fa-circle-o"></i> RAT </a></li>
            <li><a href="{{ url('galery') }}"><i class="fa fa-circle-o"></i> RAT Gallery </a></li>
            <li><a href="{{ url('document') }}"><i class="fa fa-circle-o"></i> Legal </a></li>
            <li><a href="{{ url('legalfaq') }}"><i class="fa fa-circle-o"></i> Legal FAQ's </a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i>
            <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('produk') }}"><i class="fa fa-circle-o"></i> Produk </a></li>
            <li><a href="{{ url('product_setting') }}"><i class="fa fa-circle-o"></i> Setting Pembiayaan</a></li>
            
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('news') }}"><i class="fa fa-circle-o"></i> Berita List </a></li>
            
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i>
            <span>Form User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('register_user_download') }}"><i class="fa fa-circle-o"></i> Form Download Pendaftaran</a></li>
            <li><a href="{{ url('register_user_upload') }}"><i class="fa fa-circle-o"></i> Form Upload Pendaftaran</a></li>
                
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i>
            <span>Keanggotaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('membership') }}"><i class="fa fa-circle-o"></i> Daftar Anggota</a></li>
            <li><a href="{{ url('upload_anggota') }}"><i class="fa fa-circle-o"></i> Upload Data Anggota</a></li>
            <li><a href="{{ url('saving') }}"><i class="fa fa-circle-o"></i> Simpanan</a></li>
            <li><a href="{{ url('upload_simpanan') }}"><i class="fa fa-circle-o"></i> Upload Data Simpanan</a></li>
            <li><a href="{{ url('withdraw') }}"><i class="fa fa-circle-o"></i> Penarikan</a></li>
            <li><a href="{{ url('financing') }}"><i class="fa fa-circle-o"></i> Pembiayaan</a></li>
            <li><a href="{{ url('upload_financing') }}"><i class="fa fa-circle-o"></i> Upload Data Pembiayaan</a></li>
                    
                
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-question"></i>
            <span>FAQ's</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('faqs') }}"><i class="fa fa-circle-o"></i> FAQ's</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="{{ url('user') }}"><i class="fa fa-circle-o"></i> User List</a></li>
            <li><a href="{{ url('level') }}"><i class="fa fa-circle-o"></i> User Level</a></li>  
            
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('setting') }}"><i class="fa fa-circle-o"></i> General Setting</a></li>
            
          </ul>
        </li>
        
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
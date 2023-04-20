@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          @can('edit artikel')
          <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Berita</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                @can('edit artikel')
                <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/article/create') }}"><i class="fa fa-plus"></i> <span>Tambah Artikel</span></a></li>
                @endcan
                @can('edit artikel')
                <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/article') }}"><i class="fa fa-newspaper-o"></i> <span>Semua Artikel</span></a></li>
                @endcan
                @can('manage kategori')
                <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/category') }}"><i class="fa fa-list"></i> <span>Kategori</span></a></li>
                @endcan
                @can('manage tags')
                <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/tag') }}"><i class="fa fa-tag"></i> <span>Tag</span></a></li>
                @endcan
              </ul>
          </li>
          @endcan
          @can('edit artikel')
          <li class="treeview">
              <a href="#"><i class="fa fa-car" aria-hidden="true"></i> <span>Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                @can('edit artikel')
                <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/product/create') }}"><i class="fa fa-plus"></i> <span>Tambah Produk</span></a></li>
                @endcan
                @can('edit artikel')
                <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/product') }}"><i class="fa fa-newspaper-o"></i> <span>Semua Produk</span></a></li>
                @endcan
                @can('manage kategori')
                <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/product-category') }}"><i class="fa fa-list"></i> <span>Kategori</span></a></li>
                @endcan
              </ul>
          </li>
          @endcan
          @can('manage media')
          <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>Media</span></a></li>
          @endcan
          @can('manage laman')
          <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/page') }}"><i class="fa fa-file-o"></i> <span>Laman</span></a></li>
          @endcan
          @can('manage menu')
          <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>
          @endcan
          <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/slider') }}"><i class="fa fa-sliders"></i> <span>Slider</span></a></li>
          
          <!--li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li-->
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          @can('manage pengguna')
          <li class="treeview">
            <a href="#"><i class="fa fa-group"></i> <span>Pengguna</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              @can('manage pengguna')
              <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/user') }}"><i class="fa fa-user"></i> <span>Pengguna</span></a></li>
              @endcan
              <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha') . '/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
            </ul>
          </li>
          @endcan
          @can('manage pengaturan')
          <li class="treeview">
            <a href="#"><i class="fa fa-cog"></i> <span>Pengaturan</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/setting') }}"><i class="fa fa-cog"></i> <span>Pengaturan Umum</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/setting-homepage') }}"><i class="fa fa-home"></i> <span>Pengaturan Homepage</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/setting-topmenu') }}"><i class="fa fa-home"></i> <span>Pengaturan Top Menu</span></a></li>
              <!--li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/setting-sidebar') }}"><i class="fa fa-align-right"></i> <span>Pengaturan Sidebar</span></a></li-->
              <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/setting-footer') }}"><i class="fa fa-address-book-o"></i> <span>Pengaturan Footer</span></a></li>
            </ul>
          </li>
          @endcan
          <li><a href="{{ url(config('backpack.base.route_prefix', 'amartha').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif

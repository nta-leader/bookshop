<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ $urlTemplateAdmin }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Các danh mục</li>
        <li class="{{ Request::is('admin/home*') ? 'active' : ''}}">
          <a href="{{ route('admin.home.index') }}">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/category*') ? 'active' : ''}}">
          <a href="{{ route('admin.category.index') }}">
            <i class="fa fa-files-o"></i>
            <span>Quản lý danh mục</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/product*') ? 'active' : ''}}">
          <a href="">
            <i class="fa fa-th"></i> <span>Quản lý sản phẩm</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/sale*') ? 'active' : '' }}">
          <a href="">
            <i class="fa fa-newspaper-o"></i>
            <span>Quản lý sale - slide</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('admin/order-form*') ? 'menu-open':'' }}">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Đơn hàng</span>
            <span class="pull-right-container">
              <small class="label pull-left bg-yellow">1</small>
              <small class="label pull-left bg-green">1</small>
              <small class="label pull-left bg-red">1</small>
            </span>
          </a>
          <ul class="treeview-menu" style="display: {{ Request::is('admin/order-form*') ? 'block':'none' }};">
            <li class="{{ Request::is('admin/order-form/index') ? 'active':'' }}">
              <a href="">
                <i class="fa fa-circle-o"></i>Đơn hàng mới
                <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">1</small>
                </span>
              </a>
            </li>
            <li class="{{ Request::is('admin/order-form/confirm') ? 'active':'' }}">
              <a href="">
                <i class="fa fa-circle-o"></i> Đơn hàng đã xác nhận
                <span class="pull-right-container">
                  <small class="label pull-left bg-green">1</small>
                </span>
              </a>
            </li>
            <li class="{{ Request::is('admin/order-form/cancel-order') ? 'active':'' }}">
              <a href="">
                <i class="fa fa-circle-o"></i> Đơn hàng hủy
                <span class="pull-right-container">
                  <small class="label pull-left bg-red">1</small>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="{{ Request::is('admin/mail*') ? 'active' : '' }}">
          <a href="" title="Khi có đơn hàng mới sẽ thông báo đến mail">
            <i class="fa fa-envelope"></i> <span >Quản lý mail</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/buy-more*') ? 'active' : '' }}">
          <a href="" title="Sau khi đặt hàng sẽ xuất hiện những sản phẩm này !">
            <i class="fa fa-book"></i> <span>Quản lý mua thêm</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
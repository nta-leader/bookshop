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
          <a href="{{ route('admin.product.index') }}"">
            <i class="fa fa-th"></i> <span>Quản lý sản phẩm</span>
          </a>
        </li>
        <li class="{{ Request::is('admin/sale*') ? 'active' : '' }}">
          <a href="{{ route('admin.sale.index') }}">
            <i class="fa fa-newspaper-o"></i>
            <span>Quản lý sale - slide</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('admin/order-form*') ? 'menu-open':'' }}">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Đơn hàng</span>
            <span class="pull-right-container">
              <small class="label pull-left bg-yellow">{{ $boot_count_order }}</small>
              <small class="label pull-left bg-blue">{{ $boot_count_order_confirmed }}</small>
              <small class="label pull-left bg-green">{{ $boot_count_order_success }}</small>
              <small class="label pull-left bg-red">{{ $boot_count_order_cancel }}</small>
            </span>
          </a>
          <ul class="treeview-menu" style="display: {{ Request::is('admin/orderform*') ? 'block':'none' }};">
            <li class="{{ Request::is('admin/orderform/index') ? 'active':'' }}">
              <a href="{{ route('admin.orderform.index') }}">
                <i class="fa fa-circle-o"></i>Đơn hàng mới
                <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">{{ $boot_count_order }}</small>
                </span>
              </a>
            </li>
            <li class="{{ Request::is('admin/orderform/confirmed') ? 'active':'' }}">
              <a href="{{ route('admin.orderform.confirmed') }}">
                <i class="fa fa-circle-o"></i> Đơn hàng đã xác nhận
                <span class="pull-right-container">
                  <small class="label pull-left bg-blue">{{ $boot_count_order_confirmed }}</small>
                </span>
              </a>
            </li>
            <li class="{{ Request::is('admin/orderform/success') ? 'active':'' }}">
              <a href="{{ route('admin.orderform.success') }}">
                <i class="fa fa-circle-o"></i> Đơn hàng đóng gói
                <span class="pull-right-container">
                  <small class="label pull-left bg-green">{{ $boot_count_order_success }}</small>
                </span>
              </a>
            </li>
            <li class="{{ Request::is('admin/orderform/cancel') ? 'active':'' }}">
              <a href="{{ route('admin.orderform.cancel') }}">
                <i class="fa fa-circle-o"></i> Đơn hàng hủy
                <span class="pull-right-container">
                  <small class="label pull-left bg-red">{{ $boot_count_order_cancel }}</small>
                </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="{{ Request::is('admin/news*') ? 'active' : '' }}">
          <a href="{{ route('admin.news.index') }}" title="Quản lý bài viết">
            <i class="fa fa-edit"></i> <span >Quản lý bài viết</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
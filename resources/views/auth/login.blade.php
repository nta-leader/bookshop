
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ $urlTemplateAdmin }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ $urlTemplateAdmin }}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ $urlTemplateAdmin }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ $urlTemplateAdmin }}/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ $urlTemplateAdmin }}/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="height:auto;">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ $urlTemplateAdmin }}/index2.html"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập để vào quản trị</p>

    <form action="{{ route('auth.login') }}" method="post">
      {{ csrf_field() }}
			@if(Session::has('msg'))
				<p class="msg">{{ Session::get('msg') }}</p>
			@endif
			@if ($errors->has('username'))
				<div class="alert alert-danger error">
					<ul>
						@foreach ($errors->get('username') as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
      <div class="form-group has-feedback">
        <input type="tex" name="username" class="form-control" value="{{ old('username') }}" placeholder="Tài khoản">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
			@if ($errors->has('password'))
				<div class="alert alert-danger error">
					<ul>
						@foreach ($errors->get('password') as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
           
        </div>
        <!-- /.col -->
        <div class="col-xs-6" style="text-align:right;">
          <button type="submit" class="btn btn-primary btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ $urlTemplateAdmin }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ $urlTemplateAdmin }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>

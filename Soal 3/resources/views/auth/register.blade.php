<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>
    <form action="{{URL('register')}}" method="post">
    {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="user_full_name" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if($errors->first('user_full_name'))<div class="alert alert-danger">{{$errors->first('user_full_name')}}</div>@endif
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="user_name" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if($errors->first('user_name'))<div class="alert alert-danger">{{$errors->first('user_name')}}</div>@endif
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="No Rekening" name="user_no_rekening" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if($errors->first('user_no_rekening'))<div class="alert alert-danger">{{$errors->first('user_no_rekening')}}</div>@endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="user_password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if($errors->first('user_password'))<div class="alert alert-danger">{{$errors->first('user_password')}}</div>@endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="user_password_confirmation" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        @if($errors->first('user_password_confirmation'))<div class="alert alert-danger">{{$errors->first('user_password_confirmation')}}</div>@endif
      </div>
      <div class="row">
        <div class="col-xs-7 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">DAFTAR</button>
        </div>
      </div>
    </form>
    <a href="{{URL('login')}}" class="text-center">SAYA SUDAH PUNYA AKUN</a>
</body>
</html>
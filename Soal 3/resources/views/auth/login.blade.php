<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
    <form action="{{URL('login')}}" method="post">
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="user_name" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if($messageEmail == "")
        @else
          <div class="alert alert-danger"></span><em>{{$messageEmail}}</em></div>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="user_password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>  
        </div>
      </div>
    </form>
    <center>
      <a href="{{URL('register')}}" class="text-center">DAFTAR BARU </a>
    </center>
</body>
</html>
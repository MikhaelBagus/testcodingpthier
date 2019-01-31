<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
    <div class='box'>
        <div class='box-body'>
            <div class='form-group'>
                <label>Nama Lengkap:</label>
                <div class='form-control text'>{{Auth::user()->user_full_name}}</div>
            </div>
            <div class='form-group'>
                <label>Username:</label>
                <div class='form-control text'>{{Auth::user()->user_name}}</div>
            </div>
            <div class='form-group'>
                <label>No Rekening:</label>
                <div class='form-control text'>{{Auth::user()->user_no_rekening}}</div>
            </div>
            <div class='form-group'>
                <label>Saldo:</label>
                <div class='form-control text'>{{Auth::user()->user_saldo}}</div>
            </div>
        </div>
    </div>
    <button type="button"><a href="{{URL('topup')}}">Topup</a></button>
    <button type="button"><a href="{{URL('withdraw')}}">Withdraw</a></button>
    <button type="button"><a href="{{URL('transfer')}}">Transfer</a></button>
    <button type="button"><a href="{{URL('mutasi')}}">Mutasi</a></button>
    <button type="button"><a href="{{URL('logout')}}">Logout</a></button>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Top Up</title>
</head>
<body>
    <form action="{{Url('/topup')}}" method='post'>
    {{csrf_field()}}
        <div class='box-body'>
            <div class='form-group com-sm-12'>
                <label class='col-sm-3'>Top up</label>
                <div class='col-sm-8'>
                    <input type='number' name="topup" class='form-control' placeholder="ex:123" required="" value="0" min="1">
                    @if($errors->first('topup'))<div class="alert alert-danger">{{$errors->first('topup')}}</div>@endif
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Top Up</button>
        </div>
    </form>
    <button type="button"><a href="{{URL('home')}}">Home</a></button>
    <button type="button"><a href="{{URL('topup')}}">Topup</a></button>
    <button type="button"><a href="{{URL('withdraw')}}">Withdraw</a></button>
    <button type="button"><a href="{{URL('transfer')}}">Transfer</a></button>
    <button type="button"><a href="{{URL('mutasi')}}">Mutasi</a></button>
    <button type="button"><a href="{{URL('logout')}}">Logout</a></button>
</body>
</html>
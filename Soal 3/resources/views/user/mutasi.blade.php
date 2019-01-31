<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
    <table border="3">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Tujuan</th>
            <th>Jumlah</th>
            <th>Saldo</th>
        </tr>
        <?php $no = 1; ?>
        @foreach($mutasi as $mutasi)
        <tr>
            <td><?php echo $no; ?></td>
            <td>{{$mutasi->mutasi_code}}</td>
            <td>{{$mutasi->mutasi_date}}</td>
            @if($mutasi->mutasi_flag == 1)
            <td>Top Up</td>
            @elseif($mutasi->mutasi_flag == 2)
            <td>Withdraw</td>
            @elseif($mutasi->mutasi_flag == 3)
            <td>Transfer</td>
            @endif
            <td>{{$mutasi->tujuan}}</td>
            <td>{{$mutasi->mutasi_jumlah}}</td>
            <td>{{$mutasi->mutasi_saldo}}</td>
        </tr>
        <?php $no = $no + 1; ?>
        @endforeach
    </table>
    <button type="button"><a href="{{URL('home')}}">Home</a></button>
    <button type="button"><a href="{{URL('topup')}}">Topup</a></button>
    <button type="button"><a href="{{URL('withdraw')}}">Withdraw</a></button>
    <button type="button"><a href="{{URL('transfer')}}">Transfer</a></button>
    <button type="button"><a href="{{URL('mutasi')}}">Mutasi</a></button>
    <button type="button"><a href="{{URL('logout')}}">Logout</a></button>
</body>
</html>
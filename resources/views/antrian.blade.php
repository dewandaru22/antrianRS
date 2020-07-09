<html>
<head>
  <title>Sistem Antrian</title>
  <link rel="stylesheet" href="https://bootstrap/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://>bootstrap/css/jquery-ui.min.css">  
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<body>
<div class="container-fluid alert-danger">
<div class="row">
    
    @foreach ($data as $d)
  <div class="col-md-4">
    <div class="btn-danger" style="font-size: 20px;font-weight: bold;width: 100%;">{{ $d->nama_dokter }}</div>
    <div class="text-lg-center btn-success img-thumbnail" style="font-size: 50px;font-weight: bold;width: 100%;">
        {{ $d->antrian == null ? '' : $d->antrian->heads->nomor_periksa }}
        <div class="btn-danger">{{$d->periksa->where('status', 'Menunggu')->count()}}</div>
    </div>
    <hr/>
  </div>
  @endforeach

</div>
</div>
<script src="https://bootstrap/js/jquery.min.js"></script>
<script src="https://bootstrap/js/jquery-ui.min.js"></script>

</body>
</html>
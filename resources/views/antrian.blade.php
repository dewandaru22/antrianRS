<html>
<head>
  <title>Info Antrian</title>
  <link rel="stylesheet" href="https://bootstrap/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://>bootstrap/css/jquery-ui.min.css">  
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<body>
  <div class="container-fluid alert-danger">
    <div class="row">
   
      <div class="col-md-3">
        <div style="margin-top:20px;">
          <img class="navbar-brand-full" src="{{('/template/images/rs-islam-logo.png')}}" width="200" height="60" alt="rsiy logo">
        </div>
      </div>

      <div class="col-md-3">
      </div>
      <div class="col-md-3">
      </div>

      <div class="col-md-3">
        <div class="text-lg-center btn-success img-thumbnail" style="font-size: 20px;font-weight: bold; margin-bottom:10px; margin-top:10px; color:#fff;">
          <?php echo date('l');?>, <?php echo date('d F Y');?><br/>
          <div id="jam_sekarang"><?php echo date('H:m:i');?></div>
        </div>
      </div>
      <br/>
      <hr/>

      @foreach ($data as $d)
      <div class="col-md-4">
        <div class="text-lg-center btn-success img-thumbnail" style="font-size: 25px;font-weight: bold; height:160px; margin-bottom:10px;">
            {{ $d->nama_dokter }}
            <div class="btn-danger" style="font-size: 60px;font-weight: bold; height:110px;">{{ $d->antrian->head == null ? '' : $d->antrian->heads->nomor_periksa }} </div>
        </div>
      </div>
      @endforeach

      <div class="col-md-12">
        <div class="text-lg-center btn-success img-thumbnail" style="font-size: 23px;font-weight: regular; margin-bottom:10px; color:#fff;">
          <marquee>SELAMAT DATANG DI RUMAH SAKIT ISLAM YOGYAKARTA PDHI - Jl. Jogja Solo KM.12,5, Kringinan, Tirtomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571</marquee>
        </div>
      </div>

    </div>
  </div>
<script src="https://bootstrap/js/jquery.min.js"></script>
<script src="https://bootstrap/js/jquery-ui.min.js"></script>
<script>
    var myVar = setInterval(myTimer, 1000);
    function myTimer() {
        var d = new Date();
        document.getElementById("jam_sekarang").innerHTML = d.toLocaleTimeString();
    }  
</script>

</body>
</html>
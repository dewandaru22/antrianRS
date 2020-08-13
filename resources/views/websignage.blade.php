<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Antrian RSIY PDHI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('/template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/template/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/template/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('/template/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('/template/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('/template/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('/template/scss/bootstrap/_card.scss') }}">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="/awal" class="text-black mb-0">
              <img class="navbar-brand-full" src="{{asset ('/template/images/rs-islam-logo.png')}}" width="150" height="40" alt="rsiy logo" href="/websignage">
            </a></h1>
          </div>
          
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
  
  <div class="site-wrap">

    <div class="site-blocks-cover overlay" style="background-image: url('{{ asset('/template/images/rsiy.jpg')}}'); " data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="main">
            <div class="card7">
                  <h5 style="color:#ffffff">ANTRIAN RSIY PDHI YOGYAKARTA</h5>
            </div>
            <br/>
            <div class="card2">
              <label style="float:right">
                <select id="select_dokter" class="form-control">
                  <option selected disabled>Pilih Dokter</option>
                  @foreach ($dokter as $d)
                  <option value="{{$d->id}}" {{ $d->id == Route::input('id') ? "selected" : "" }}>{{$d->nama_dokter}}</option>
                  @endforeach
                </select>
              </label>
            </div>

            <div class="card2">
                  <h5 style="color:#ffffff">Pasien Saat Ini</h5>
            </div>
            
            @if($antrian == null)
              <div class="card3">
                <h5>
                  -
                </h5>
              </div>
            @else
              <div class="card3">
                  <h5>
                  {{ $antrian->head ==  null ? '-' :  $antrian->heads->nomor_periksa}}
                  </h5>
              </div>
            @endif
            <br/>

            <div class="card2">
                  <h5 style="color:#ffffff">Pasien Selanjutnya</h5>
            </div>
            <div class="card3">
                  <h5>
                  {{ $data ==  null ? '-' :  $data->nomor_periksa}}
                  </h5>
            </div>

            <br/>
            <div class="card2">
                  <h5 style="color:#ffffff">Pasien Menunggu</h5>
            </div>
            
            @if($antrian == null)
              <div class="card4">
                <h5>
                  -
                </h5>
              </div>
            @else
              @foreach($periksa as $p)
                
                @if ($antrian->head != $p['id'])
                  <div class="card4">
                    <h5>{{ $p['nomor_periksa'] }}</h5>
                  </div>
                @endif
                
              @endforeach
            @endif
            
            <br/>

            <div class="card2">
                  <h5 style="color:#ffffff">Pasien Selesai</h5>
            </div>
            
            @if($antrian == null)
              <div class="card4">
                <h5>
                  -
                </h5>
              </div>
            @else
              @foreach($selesai as $s)
                <div class="card4">
                  <h5>
                    {{ $antrian ==  null ? '-' : $s->nomor_periksa}}
                  </h5>
                </div>
              @endforeach
            @endif
            
            

        </div>
      </div>
    </div>  


  </div> <!-- .site-wrap -->

  <script src="{{ asset('/template/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('/template/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('/template/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('/template/js/popper.min.js') }}"></script>
  <script src="{{ asset('/template/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/template/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('/template/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('/template/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('/template/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('/template/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('/template/js/aos.js') }}"></script>
  <script src="{{ asset('/template/js/jquery.fancybox.min.js') }}"></script>
  
  <script src="{{ asset('/template/js/main.js') }}"></script>
  
  <script>

        $('#select_dokter').change(function() {
            var url = "{{route('websignage')}}/" + $(this).val();
            window.location.href = url;
        });

  </script>

    
  </body>
</html>
@extends('perawat/base')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Antrian</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div>
                    <p style="font-size:20px; margin-bottom:10px;">Dokter :
                        <select id="select_dokter" style="border:1px solid #ced4da; border-radius:0.25rem; box-shadowa: inset 0 0 0 rgba(0, 0, 0, 0); width:50%">
                            <option selected disabled>Pilih Dokter</option>
                            @foreach ($dokter as $d)
                            <option value="{{$d->id}}" {{ $d->id == $id ? "selected" : "" }}>{{$d->nama_dokter}}</option>
                            @endforeach
                        </select>
                    </p>
                       
                </div>
              <table class="table table-responsive-lg table-bordered small" id="jadwal">
                <thead class="thead-dark">
                    <tr>
                        <th>No. Antrian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($periksa as $p)
                    <tr>
                        <td>{{ $p['nomor_periksa'] }}</td>
                        <td>
                              @if ($p['status'] == "Menunggu")
                                  <button class="edit btn btn-sm btn-danger" rel="tooltip" data-toggle="modal" data-target="#edit" value="{{$p['id']}}">
                                      Menunggu
                                  </button>
                              @else
                                  <button class="edit btn btn-sm btn-success" rel="tooltip" data-toggle="modal" data-target="#edit" value="{{$p['id']}}">
                                      Diperiksa
                                  </button>
                              @endif
                        </td>
                        
                        <td>
                            @if ($antrian->head != $p['id'])
                                <a href="{{route('naik.antrian',$p['id'])}}" class="btn btn-sm btn-primary" style="color:white;">
                                    <span class="fa fa-arrow-up"></span>
                                </a>
                            @endif

                            @if ($antrian->tail != $p['id'])
                            <a href="{{route('turun.antrian',$p['id'])}}" class="btn btn-sm btn-primary" style="color:white;">
                                <span class="fa fa-arrow-down"></span>
                            </a>

                            @endif
                            @if ($antrian->head == $p['id'])
                            <a href="{{route('selesai.antrian',$p['id'])}}" class="btn btn-sm btn-success" style="color:white;">
                                <span class="fa fa-check"></span>
                            </a>
                            @endif
                            <!-- <button type="button" class="edit btn-icon" rel="tooltip" data-toggle="modal" data-target="#edit" value="{{$p['id']}}">
                                <i class="material-icons" style="color: #2B82BC;font-size:1.1rem;cursor: pointer;">edit</i>
                            </button> -->
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <div class="modal fade" id="edit" tabindex="-1" role="">
      <div class="modal-dialog modal-login" role="document">
          <div class="modal-content">
              <div class="card card-signup card-plain">
                  <div class="modal-header">
                      <div class="card-header card-header-primary text-center">
                        <h4 class="card-title">Ubah Status</h4>
                      </div>
                  </div>
                  <form method="POST" action="" id="form">
                      {{method_field('PUT')}}
                      @csrf
                      <div class="modal-body">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-4">
                                      <h6 class="text-dark font-weight-light">Nomor Antrian</h6>
                                  </div>
                                  <div class="col-8">
                                      <h6 class="text-dark font-weight-bold" id="nomor_periksa"></h6>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-4 align-self-center">
                                      <h6 class="text-dark font-weight-light">Status</h6>
                                  </div>
                                  <div class="col-8" id="status">
                                      <select class="form-control" name="status">
                                          <option value="Diperiksa">Diperiksa</option>
                                          <option value="Menunggu">Menunggu</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                          <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                          <button type="submit" class="btn btn-danger btn-round" data-dismiss="modal" aria-hidden="true">Batal</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
  @endsection

@push('js')
    <script>

        $('#select_dokter').change(function() {
            var url = "{{route('perawat.index')}}/" + $(this).val();
            window.location.href = url;
        });

        $(document).ready(function(){
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
            $(document).on('click', '.edit', function(){
                var id = $(this).attr('value');
                console.log(id);
                
                $.ajax({
                    type        : 'get',
                    url         : '{!!url('perawat')!!}/'+id+'/edit',
                    dataType    : 'html',
                    success     : function(data){
                        var servers = $.parseJSON(data);
                        console.log(servers);

                        $.each(servers, function(index, value){
                            var nomor_periksa = value.nomor_periksa;
                            var status = value.status;
                            
                            $('#nomor_periksa').text(nomor_periksa);
                            $('div#status select').val(status);

                        });
                    }

                });

                var action = '{{ route("perawat.update", ":id") }}';
                action = action.replace(':id', id);
                // console.log(id);
                // console.log(action);
                $('#form').attr('action',action);
            })
        })
    </script>
@endpush
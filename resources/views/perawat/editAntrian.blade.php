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
              <table class="table table-responsive-lg table-bordered small" id="jadwal">
                <thead class="thead-dark">
                    <tr>
                        <th>No. Antrian</th>
                        <th>Aksi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($periksa as $p)
                    <tr>
                        <td>{{ $p->nomor_periksa }}</td>
                        <form action="{{ route('perawat.update', $p->id) }}" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                        <td>
                        <input type="text" class="form-control" id="nomor_periksa" name="nomor_periksa" style="display:none" value="{{ $p->nomor_periksa }}">
                        <input type="text" class="form-control" id="pasien_id" name="pasien_id" style="display:none" value="{{ $p->pasien_id }}">
                        <input type="text" class="form-control" id="dokter_id" name="dokter_id" style="display:none" value="{{ $p->dokter_id }}">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" style="display:none" value="{{ $p->tanggal }}">
                        <button type="submit" value="Diperiksa" id="status" name="status" class=" btn btn-sm btn-primary">
                        {{ $p->status }}</button>
                        </td>
                        
                        </form>
                        <td>
                          <button class=" btn btn-sm btn-success" style="color:white;">
                            <span class="fa fa-arrow-up"></span>
                          </button>
                          <button class=" btn btn-sm btn-success" style="color:white;">
                            <span class="fa fa-arrow-down"></span>
                          </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
  <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
  @endsection
  
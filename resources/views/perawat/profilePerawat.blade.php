@extends('perawat/base')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Kata Sandi</h1>
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
                <div class="form-group">
                    <!-- <a class="btn-edit" style="margin-left:auto;" href="/editAdmin">
                       Edit profile
                    </a> -->
      
                    @php $no = 1; @endphp
                    <td>
                                <a href="/changePassword" class="btn btn-outline-primary btn-sm" style="margin-left:auto; float:right">Ubah Kata Sandi</a>   <br>    
                            </td>
     
					<div class="form-group">
						<label for="">Nama Lengkap :</label>
						<input type="text" class="form-control" id="nama" name="nama" value="{{ $data->name }}" disabled>
                    </div>
                    
                    <div class="form-group">
						<label for="">Nomor Perawat :</label>
						<input type="text" class="form-control" id="number" name="number" value="{{ $data->number }}" disabled>
					</div>

					<div class="form-group">
						<label for="">Email :</label>
						<input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}" disabled>
					</div>

                </div>
                </div>
            </div>
            </div> 
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

  <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
  @endsection
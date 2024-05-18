@extends("layouts.private.app")

@section("title")
  Update Pendidikan
@endsection

@section("content")
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Pendidikan</h1>

    <div class="card o-hidden border-0 shadow-lg">
      <div class="card-body p-0">
        <div class="p-4">
          <h1 class="h4 text-gray-900 mb-4">Pendidikan</h1>
          <form class="user" action="{{ route("update_pendidikan", $pendidikan->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_institusi">Nama Institusi</label>
                <input type="text" name="nama_institusi" class="form-control" id="nama_institusi"
                  value="{{ $pendidikan->nama_institusi }}">
              </div>
              <div class="col-sm-6">
                <label for="jenjang">Jenjang</label>
                <input type="text" name="jenjang" class="form-control" id="jenjang"
                  value="{{ $pendidikan->jenjang }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="angkatan">Angkatan</label>
                <input type="text" name="angkatan" class="form-control" id="angkatan"
                  value="{{ $pendidikan->angkatan }}">
              </div>
              <div class="col-sm-6">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" id="jurusan"
                  value="{{ $pendidikan->jurusan }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="file">Upload Foto:</label>
                <input type="file" name="file" id="file" class="form-control-file">
                @if ($pendidikan->file)
                  <img src="{{ Storage::url($pendidikan->file) }}" alt="Foto" width="100">
                @endif
              </div>
            </div>
            <div class="row justify-content-end pr-3">
              <button type="submit" class="btn btn-primary">
                Ubah Data
              </button>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

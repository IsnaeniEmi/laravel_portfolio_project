@extends("layouts.private.app")

@section("title")
  Update Pengalaman
@endsection

@section("content")
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Pengalaman</h1>

    <div class="card o-hidden border-0 shadow-lg">
      <div class="card-body p-0">
        <div class="p-4">
          <h1 class="h4 text-gray-900 mb-4">Pengalaman</h1>
          <form class="user" action="{{ route("update_pengalaman", $pengalaman->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_pt">Nama Institusi</label>
                <input type="text" name="nama_pt" class="form-control" id="nama_pt"
                  value="{{ $pengalaman->nama_pt }}">
              </div>
              <div class="col-sm-6">
                <label for="posisi">posisi</label>
                <input type="text" name="posisi" class="form-control" id="posisi"
                  value="{{ $pengalaman->posisi }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="mulai">mulai</label>
                <input type="text" name="mulai" class="form-control" id="mulai" value="{{ $pengalaman->mulai }}">
              </div>
              <div class="col-sm-6">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" id="lokasi"
                  value="{{ $pengalaman->lokasi }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="file">Upload Foto:</label>
                <input type="file" name="file" id="file" class="form-control-file">
                @if ($pengalaman->file)
                  <img src="{{ Storage::url($pengalaman->file) }}" alt="Foto" width="100">
                @endif
              </div>
            </div>
            <div class="row justify-content-end pr-3">
              <button type="submit" class="btn btn-primary">
                Ubah Data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

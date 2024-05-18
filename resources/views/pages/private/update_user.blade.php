@extends("layouts.private.app")

@section("title")
  Update User
@endsection

@section("content")
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update User</h1>

    <div class="card o-hidden border-0 shadow-lg">
      <div class="card-body p-0">
        <div class="p-4">
          <h1 class="h4 text-gray-900 mb-4">User</h1>
          <form class="user" action="{{ route("update_user", $user->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
              </div>
              <div class="col-sm-6">
                <label for="agama">Agama</label>
                <input type="text" name="agama" class="form-control" id="agama" value="{{ $user->agama }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" id="status" value="{{ $user->status }}">
              </div>
              <div class="col-sm-6">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $user->alamat }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                  value="{{ $user->tempat_lahir }}">
              </div>
              <div class="col-sm-6">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                  value="{{ $user->tanggal_lahir }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="telepon">Nomor Telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon" value="{{ $user->telepon }}">
              </div>
              <div class="col-sm-6">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="{{ $user->email }}">
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

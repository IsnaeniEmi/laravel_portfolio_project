@extends("layouts.private.app")

@section("title")
  User
@endsection

@section("content")
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User</h1>

    <div class="card o-hidden border-0 shadow-lg">
      <div class="card-body p-0">
        <div class="p-4">
          <h1 class="h4 text-gray-900 mb-4">Biodata</h1>
          @if ($user == null)
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <strong>Nama Lengkap:</strong>
              </div>
              <div class="col-sm-6">
                <strong>Agama:</strong>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <strong>Status:</strong>
              </div>
              <div class="col-sm-6">
                <strong>Alamat:</strong>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <strong>Tempat Lahir:</strong>
              </div>
              <div class="col-sm-6">
                <strong>Tanggal Lahir:</strong>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <strong>Nomor Telepon:</strong>
              </div>
              <div class="col-sm-6">
                <strong>Email:</strong>
              </div>
            </div>
            <div class="row justify-content-end pr-3">
              <a href="" class="btn btn-primary disabled">
                Ubah Data
              </a>
            </div>
          @else
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <strong>Nama Lengkap:</strong> {{ $user->name }}
              </div>
              <div class="col-sm-6">
                <strong>Agama:</strong> {{ $user->agama }}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <strong>Status:</strong> {{ $user->status }}
              </div>
              <div class="col-sm-6">
                <strong>Alamat:</strong> {{ $user->alamat }}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <strong>Tempat Lahir:</strong> {{ $user->tempat_lahir }}
              </div>
              <div class="col-sm-6">
                <strong>Tanggal Lahir:</strong> {{ $user->tanggal_lahir }}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <strong>Nomor Telepon:</strong> {{ $user->telepon }}
              </div>
              <div class="col-sm-6">
                <strong>Email:</strong> {{ $user->email }}
              </div>
            </div>
            <div class="row justify-content-end pr-3">
              <a href="{{ route("edit_user", $user->id) }}" class="btn btn-primary">
                Ubah Data
              </a>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
@endsection

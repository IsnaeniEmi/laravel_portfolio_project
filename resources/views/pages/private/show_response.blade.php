@extends("layouts.private.app")

@section("title")
  Response
@endsection

@section("content")
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Response</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Respon -->
      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-lg font-weight-bold text-dark mb-1">
                  {{ $contact->nama_lengkap }}</div>
                <div class="mb-1">
                  {{ $contact->email }}</div>
                <div class="mb-1">
                  {{ $contact->telepon }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $contact->pesan }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-reply fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

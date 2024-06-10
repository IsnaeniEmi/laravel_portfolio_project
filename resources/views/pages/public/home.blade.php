@extends("layouts.public.app")

@section("title")
  Home
@endsection

@section("content")
  <!-- About Section-->
  <section class="bg-light py-5 bg-section">
    <div class="container px-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-xxl-8">
          <div class="text-center my-5">
            @if ($home == null)
            @else
              <h2 class="display-5 fw-bolder">
                <span class="d-inline">
                  {{ $home->judul_besar }}

                </span>
              </h2>
              <p class="lead fw-bold mb-4">
                {{ $home->deskripsi_judul }}
              </p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Header-->
  <header class="py-5">
    <div class="container px-5 pb-5">
      <h1 class="display-3 fw-bolder text-center"><span class="text-gradient d-inline text-color">About</span>
      </h1>
      <div class="row gx-5 align-items-center">
        <div class="col-xxl-7">
          <!-- Header profile picture-->
          <div class="d-flex justify-content-center mt-5 mt-xxl-0">
            <div class="profile d-flex justify-content-center align-items-center">
              @if ($home == null)
                <img class="profile-img rounded-circle" src="{{ asset("asset/public/assets/img.jpg") }}" alt="foto" />
              @else
                <img class="profile-img rounded-circle" src="{{ Storage::url($home->file) }}" alt="foto" />
              @endif

            </div>
          </div>
        </div>
        <div class="col-xxl-5">
          <!-- Header text content-->
          <div class="text-center text-xxl-start">
            <div class="fs-4 mb-5">
              @if ($home == null)
              @else
                {{ $home->deskripsi_about }}
              @endif
            </div>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
              <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder border-0"
                style="background-color: #008ABA" href="{{ route("profile") }}">
                Profile
              </a>
              <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ route("contact") }}">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection

@push("style-img")
  <style>
    .profile-img {
      clip-path: ellipse(50% 80% at 50% 50%);
    }

    .bg-section {
      background-image: url('{{ asset("asset/public/assets/background.jpg") }}');
      /* Ganti dengan URL gambar Anda */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
      color: white;
    }

    .bg-section h2,
    .bg-section p {
      color: white;
    }

    .bg-section .text-gradient {
      color: white;
    }

    .bg-section::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }
  </style>
@endpush

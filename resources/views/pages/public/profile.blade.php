@extends("layouts.public.app")

@section("title")
  Profile
@endsection

@section("content")
  <!-- Page Content-->
  <div class="container px-5 my-5">
    <div class="text-center mb-5">
      <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline text-color">Resume</span></h1>
    </div>
    <div class="row gx-5 justify-content-center">
      <div class="col-lg-11 col-xl-9 col-xxl-8">
        <!-- Experience Section-->
        <section>
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="text-primary fw-bolder mb-0 text-color">Pendidikan</h2>
          </div>
          <!-- Experience -->
          @foreach ($pendidikan as $item)
            <div class="card shadow border-0 rounded-4 mb-5">
              <div class="card-body p-5">
                <div class="row align-items-center gx-5">
                  <div class="col mb-4 mb-lg-0">
                    @if ($item->file)
                      <img src="{{ Storage::url($item->file) }}" alt="Foto" width="100">
                    @else
                      Tidak ada foto
                    @endif
                  </div>
                  <div class="col-lg-8 ps-0">
                    <div class="fw-bolder mb-2">{{ $item->nama_institusi }}</div>
                    <div class="small fw-bolder">{{ $item->jenjang }}</div>
                    <div class="small text-muted">{{ $item->angkatan }}</div>
                    <div class="small text-muted">{{ $item->jurusan }}</div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </section>
        <!-- Education Section-->
        <section>
          <h2 class="text-secondary fw-bolder mb-4 text-color">Pengalaman</h2>
          <!-- Education Card 1-->
          @foreach ($pengalaman as $item)
            <div class="card shadow border-0 rounded-4 mb-5">
              <div class="card-body p-5">
                <div class="row align-items-center gx-5">
                  <div class="col mb-4 mb-lg-0">
                    @if ($item->file)
                      <img src="{{ Storage::url($item->file) }}" alt="Foto" width="100">
                    @else
                      Tidak ada foto
                    @endif
                  </div>
                  <div class="col-lg-8">
                    <div class="fw-bolder mb-2">{{ $item->masuk }}</div>
                    <div class="mb-2">
                      <div class="small fw-bolder">{{ $item->nama_pt }}</div>
                      <div class="small text-muted">{{ $item->lokasi }}</div>
                    </div>
                    <div class="fst-italic">
                      <div class="small text-muted">{{ $item->posisi }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </section>
      </div>
    </div>
  </div>
@endsection

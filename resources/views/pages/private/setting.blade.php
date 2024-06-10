@extends("layouts.private.app")

@section("title")
  Setting
@endsection

@section("content")
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card o-hidden border-0 shadow-lg my-3">
          <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Setting</h6>
            <div class="d-flex">
              @if ($home == null)
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2"
                  data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-download fa-sm text-white-50"></i> Add Home
                </button>
              @else
                <form action="{{ route("destroy_setting_home", $home->id) }}" method="POST" class="mb-0 mr-2">
                  @csrf
                  @method("DELETE")
                  <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')"
                    class="btn btn-sm btn-danger shadow-sm">
                    <i class="fas fa-trash fa-sm text-white-50"></i> Delete Home
                  </button>
                </form>
              @endif

              @if ($footer == null)
                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                  data-toggle="modal" data-target="#exampleModal1">
                  <i class="fas fa-download fa-sm text-white-50"></i> Add Footer
                </button>
              @else
                <form action="{{ route("destroy_setting_footer", $footer->id) }}" method="POST" class="mb-0">
                  @csrf
                  @method("DELETE")
                  <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')"
                    class="btn btn-sm btn-danger shadow-sm">
                    <i class="fas fa-trash fa-sm text-white-50"></i> Delete Footer
                  </button>
                </form>
              @endif
            </div>
          </div>
          <div class="card-body p-0">
            <div class="p-4">
              @if ($home == null)
                <div class="mb-4">
                  <h1 class="h4 text-gray-900 mb-4">Home</h1>
                  <div class="form-group">
                    Judul Besar:
                  </div>
                  <div class="form-group">
                    Deksripsi 1:
                  </div>
                  <div class="form-group">
                    Deskripsi 2:
                  </div>
                  <div>
                    <img src="" alt="Foto" width="100">
                  </div>
                </div>
              @else
                <div class="mb-4">
                  <h1 class="h4 text-gray-900 mb-4">Home</h1>
                  <div class="form-group">
                    Judul Besar: {{ $home->judul_besar }}
                  </div>
                  <div class="form-group">
                    Deksripsi 1: {{ $home->deskripsi_judul }}
                  </div>
                  <div class="form-group">
                    Deskripsi 2: {{ $home->deskripsi_about }}
                  </div>
                  <div>
                    <img src="{{ Storage::url($home->file) }}" alt="Foto" width="100">
                  </div>
                </div>
              @endif

              @if ($footer == null)
                <div class="mb-3">
                  <h1 class="h4 text-gray-900 mb-4">Footer</h1>
                  <div class="form-group">
                    Link:
                  </div>
                </div>
              @else
                <div class="mb-3">
                  <h1 class="h4 text-gray-900 mb-4">Footer</h1>
                  <div class="form-group">
                    Link: {{ $footer->link_footer }}
                  </div>
                </div>
              @endif
            </div>
          </div>

          {{-- Modal Tambah Data Home --}}
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route("store_home") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="judul_besar" class="col-form-label">Judul Besar</label>
                      <input type="text" name="judul_besar" class="form-control" id="judul_besar">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_judul" class="col-form-label">Deskripsi 1</label>
                      <input type="text" name="deskripsi_judul" class="form-control" id="deskripsi_judul">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_about" class="col-form-label">Deskripsi 2</label>
                      <textarea name="deskripsi_about" class="form-control" id="deskripsi_about"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="file" class="col-form-label">Foto</label>
                      <input type="file" name="file" class="form-control-file" id="file">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          {{-- Modal Tambah Data Footer --}}
          <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route("store_footer") }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="link_footer" class="col-form-label">Link Footer</label>
                      <input type="text" name="link_footer" class="form-control" id="link_footer">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Update Data --}}
      <div class="col-lg-6">
        <div class="card o-hidden border-0 shadow-lg my-3">
          <div class="card-body p-0">
            <div class="p-4">
              <div class="mb-4">
                <h1 class="h4 text-gray-900 mb-4">Home</h1>
                @if ($home == null)
                  <form class="user" action="" method="">
                    <div class="form-group">
                      <label for="">Judul Besar</label>
                      <input type="text" class="form-control" id="" value="">
                    </div>
                    <div class="form-group">
                      <label for="">Deksripsi 1</label>
                      <input type="text" class="form-control" id="" value="">
                    </div>
                    <div class="form-group">
                      <label for="">Deskripsi 2</label>
                      <textarea class="form-control" id=""></textarea>
                    </div>
                    <div class="row justify-content-end pr-3">
                      <button type="submit" class="btn btn-primary disabled">Ubah Home</button>
                    </div>
                  </form>
                @else
                  <form class="user" action="{{ route("update_setting_home", $home->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                      <label for="judul_besar">Judul Besar</label>
                      <input type="text" name="judul_besar" class="form-control" id="judul_besar"
                        value="{{ $home->judul_besar }}">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_judul">Deskripsi 1</label>
                      <input type="text" name="deskripsi_judul" class="form-control" id="deskripsi_judul"
                        value="{{ $home->deskripsi_judul }}">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_about">Deskripsi 2</label>
                      <textarea name="deskripsi_about" class="form-control" id="deskripsi_about">{{ $home->deskripsi_about }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="file">Upload Foto:</label>
                      <input type="file" name="file" id="file" class="form-control-file">
                      @if ($home->file)
                        <img src="{{ Storage::url($home->file) }}" alt="Foto" width="100">
                      @endif
                    </div>
                    <div class="row justify-content-end pr-3">
                      <button type="submit" class="btn btn-primary">Ubah Home</button>
                    </div>
                  </form>
                @endif
              </div>

              <div class="mb-3">
                <h1 class="h4 text-gray-900 mb-4">Footer</h1>
                @if ($footer == null)
                  <form class="user">
                    <div class="form-group">
                      <label for="link_footer">Link</label>
                      <input type="text" name="link_footer" class="form-control" id="link_footer" value="">
                    </div>
                    <div class="row justify-content-end pr-3">
                      <a href="" class="btn btn-primary disabled">Ubah Footer</a>
                    </div>
                  </form>
                @else
                  <form class="user" action="{{ route("update_setting_footer", $footer->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                      <label for="link_footer">Link</label>
                      <input type="text" name="link_footer" class="form-control" id="link_footer"
                        value="{{ $footer->link_footer }}">
                    </div>
                    <div class="row justify-content-end pr-3">
                      <button type="submit" class="btn btn-primary">Ubah Footer</button>
                    </div>
                  </form>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

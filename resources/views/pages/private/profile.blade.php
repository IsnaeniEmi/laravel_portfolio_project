@extends("layouts.private.app")

@section("title")
  Profile
@endsection

@section("content")
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <!-- DataTables Pendidikan -->
    <div class="card shadow mb-4">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Pendidikan</h6>
        <button type="button" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
          data-toggle="modal" data-target="#exampleModal"><i class="fas fa-download fa-sm text-white-50"></i> Add</button>
      </div>
      <div class="card-body">
        <table class="table" id="myTablePendidikan">
          <thead>
            <tr>
              <th class="text-center">Nama Institusi</th>
              <th class="text-center">Jenjang</th>
              <th class="text-center">Angkatan</th>
              <th class="text-center">Jurusan</th>
              <th class="text-center">Logo</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pendidikan as $item)
              <tr>
                <td>{{ $item->nama_institusi }}</td>
                <td class="text-center">{{ $item->jenjang }}</td>
                <td class="text-center">{{ $item->angkatan }}</td>
                <td class="text-center">{{ $item->jurusan }}</td>
                <td class="text-center">
                  @if ($item->file)
                    <img src="{{ Storage::url($item->file) }}" alt="Foto" width="100">
                  @else
                    Tidak ada foto
                  @endif
                </td>
                <td>
                  <div class="d-flex">
                    <a href="{{ route("edit_pendidikan", $item->id) }}" class="btn btn-sm btn-info shadow-sm mr-2">
                      <i class="fas fa-pencil fa-sm text-white-50"></i>
                      Edit
                    </a>
                    <form action="{{ route("delete_pendidikan", $item->id) }}" method="POST" class="mb-0">
                      @csrf
                      @method("DELETE")
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')"
                        class="btn btn-sm btn-danger shadow-sm">
                        <i class="fas fa-trash fa-sm text-white-50"></i>
                        Delete
                      </button>
                    </form>
                  </div>
                </td>

              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- Modal Pendidikan Add --}}
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
            <form action="{{ route("create_pendidikan") }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nama_institusi" class="col-form-label">Nama Institusi</label>
                <input type="text" name="nama_institusi" class="form-control" id="nama_institusi">
              </div>
              <div class="form-group">
                <label for="jenjang" class="col-form-label">Jenjang</label>
                <input type="text" name="jenjang" class="form-control" id="jenjang">
              </div>
              <div class="form-group">
                <label for="angkatan" class="col-form-label">Angkatan</label>
                <input type="text" name="angkatan" class="form-control" id="angkatan">
              </div>
              <div class="form-group">
                <label for="jurusan" class="col-form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" id="jurusan">
              </div>
              <div class="form-group">
                <label for="file" class="col-form-label">Logo</label>
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

    <!-- DataTables Pengalaman -->
    <div class="card shadow mb-4">
      <div class="card-header d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Pengalaman</h6>
        <button type="button" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
          data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-download fa-sm text-white-50"></i>
          Add</button>
      </div>
      <div class="card-body">
        <table class="table" id="myTablePengalaman">
          <thead>
            <tr>
              <th class="text-center">Nama PT</th>
              <th class="text-center">Posisi</th>
              <th class="text-center">Mulai</th>
              <th class="text-center">Lokasi</th>
              <th class="text-center">Logo</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengalaman as $item)
              <tr>
                <td>{{ $item->nama_pt }}</td>
                <td class="text-center">{{ $item->posisi }}</td>
                <td class="text-center">{{ $item->mulai }}</td>
                <td class="text-center">{{ $item->lokasi }}</td>
                <td class="text-center">
                  @if ($item->file)
                    <img src="{{ Storage::url($item->file) }}" alt="Foto" width="100">
                  @else
                    Tidak ada foto
                  @endif
                </td>
                <td>
                  <div class="d-flex">
                    <a href="{{ route("edit_pengalaman", $item->id) }}" class="btn btn-sm btn-info shadow-sm mr-2">
                      <i class="fas fa-pencil fa-sm text-white-50"></i>
                      Edit
                    </a>
                    <form action="{{ route("delete_pengalaman", $item->id) }}" method="POST" class="mb-0">
                      @csrf
                      @method("DELETE")
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')"
                        class="btn btn-sm btn-danger shadow-sm">
                        <i class="fas fa-trash fa-sm text-white-50"></i>
                        Delete
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- Modal Pengalaman Add --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route("create_pengalaman") }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nama_pt" class="col-form-label">Nama Perusahaan</label>
                <input type="text" name="nama_pt" class="form-control" id="nama_pt">
              </div>
              <div class="form-group">
                <label for="posisi" class="col-form-label">Posisi</label>
                <input type="text" name="posisi" class="form-control" id="posisi">
              </div>
              <div class="form-group">
                <label for="mulai" class="col-form-label">Mulai Berkarir dalam Tahun</label>
                <input type="text" name="mulai" class="form-control" id="mulai">
              </div>
              <div class="form-group">
                <label for="lokasi" class="col-form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" id="lokasi">
              </div>
              <div class="form-group">
                <label for="file" class="col-form-label">Logo</label>
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

  </div>
@endsection

@push("tables")
  <script>
    $(document).ready(function() {
      $('#myTablePendidikan').DataTable();
    });

    $(document).ready(function() {
      $('#myTablePengalaman').DataTable();
    });
  </script>
@endpush

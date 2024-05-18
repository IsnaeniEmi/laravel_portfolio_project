@extends("layouts.private.app")

@section("title")
  Response
@endsection

@section("content")
  <div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Response User</h6>
      </div>
      <div class="card-body">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th>Nama Pengirim</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contact as $item)
              <tr>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->telepon }}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{ route("show_response", $item->id) }}"
                      class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i
                        class="fas fa-eye fa-sm text-white-50"></i>
                      Lihat
                    </a>
                    <form action="{{ route("delete_response", $item->id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')"
                        class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                          class="fas fa-trash fa-sm text-white-50"></i>
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

  </div>
@endsection

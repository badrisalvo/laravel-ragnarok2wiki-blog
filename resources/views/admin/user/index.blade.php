@extends('template_backend.home')
@section('judul', 'User List')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  

  <div class="card">
    <div class="card-header">
      Generate Unique Code
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.generateUniqueCode') }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">Generate Unique Code</button>
      </form>
    </div>
  </div>
  <div class="card-body">
  @if ($uniqueCodes->count() > 0)
    <ul>
        @foreach ($uniqueCodes as $code)
            @if ($code->used == 0)
                <li>
                    <div style="display: flex; align-items: center;">
                        <span>{{ $code->code }}</span>
                        <form action="{{ route('admin.deleteUniqueCode', $code->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-2">Hapus</button>
                        </form>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
@else
    <p>No Unique Codes generated yet.</p>
@endif
        </div>
  <br>
  <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah User</a><br><br>
  <table class="table table-striped table-hover table-sm table-bordered">
    <tr>
      <th>No</th>
      <th>Nama User</th>
      <th>Email</th>
      <th>Type</th>
      <th>Action</th>
    </tr>
    @foreach ($user as $result => $d)
      <tr>
        <td>{{ $result + $user->firstitem() }}</td>
        <td>{{ $d->name }}</td>
        <td>{{ $d->email }}</td>
        <td>
          @if ($d->tipe == '0')
            <span class="badge badge-info">Administrator</span>
          @elseif ($d->tipe == '1')
            <span class="badge badge-warning">Author</span>
          @else
            <span class="badge badge-warning">Seller</span>
          @endif
        </td>
        <td>
          <form action="{{ route('user.destroy', $d->id) }}" method="post">
            @csrf
            @method('delete')
            <a href="{{ route('user.edit', $d->id) }}" class="btn btn-success btn-sm">Edit</a>
            <button type="submit" class="btn btn-danger btn-sm" name="button">Delete</button>
          </form>
          @if ($d->tipe != '0' && $d->activated_until && $d->activated_until->isPast())
        <form action="{{ route('user.activate', $d->id) }}" method="post" style="display: inline;">
            @csrf
            @method('patch')
            <button type="submit" class="btn btn-primary btn-sm">Activate</button>
        </form>
    @endif
        </td>
      </tr>
    @endforeach
  </table>
  {{ $user->links() }}
@endsection

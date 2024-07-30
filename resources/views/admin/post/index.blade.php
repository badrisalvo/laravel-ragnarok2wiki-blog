@extends('template_backend.home')
@section('judul', 'Post')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Tambah Post</a><br><br>
  <table class="table table-striped table-hover table-sm table-bordered">
    <tr>
      <th>No</th>
      <th>Nama Post</th>
      <th>Kategori</th>
      <th>Daftar Tags</th>
      <th>Creator</th>
      <th>Thumbnail</th>
      <th>Action</th>
    </tr>
    @foreach ($post as $result => $d)
    @if ($d->user && $d->user->name === auth()->user()->name)
        <tr>
            <td>{{ $result + $post->firstitem() }}</td>
            <td>{{ $d->judul }}</td>
            <td>
                @if ($d->category) <!-- Tambahkan pengecekan apakah kategori tersedia -->
                    {{ $d->category->name }}
                @else
                    No Category <!-- Tampilkan pesan alternatif jika kategori tidak tersedia -->
                @endif
            </td>
            <td>
                @foreach ($d->tags as $tag)
                    <h6><span class="badge badge-info">{{ $tag->name }}</span></h6>
                @endforeach
            </td>
            <td>{{ $d->users ? $d->users->name : 'No Creator' }}</td> <!-- Tambahkan pengecekan null -->
            <td>
                <img src="{{ asset( $d->gambar ) }}" class="img-fluid" width="100" alt="">
            </td>
            <td>
                <form action="{{ route('post.destroy', $d->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('post.edit', $d->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm" name="button">Delete</button>
                </form>
            </td>
        </tr>
    @endif
@endforeach

  </table>
  {{ $post->links() }}
@endsection

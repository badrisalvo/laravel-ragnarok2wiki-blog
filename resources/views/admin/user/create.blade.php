@extends('template_backend.home')
@section('judul', 'Tambah User')
@section('content')
  @if (count($errors)>0)
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    @endforeach
  @endif

  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <form action="{{ route('user.store') }}" method="post">
    @csrf
    <div class="form-group">
      <label>Nama User</label>
      <input type="text" class="form-control" name="name" autocomplete="off">
    </div>
    <div class="form-group">
      <label>Email User</label>
      <input type="email" class="form-control" name="email" autocomplete="off">
    </div>
    <div class="form-group">
      <label>Tipe User</label>
      <select class="custom-select" name="tipe">
        <option value="" holder>Pilih Tipe User</option>
        <option value="0" holder>Administrator</option>
        <option value="1" holder>Author</option>
        <option value="2" holder>Seller</option>
      </select>
    </div>
    <div class="form-group">
      <label>Password User</label>
      <input type="password" class="form-control" name="password" autocomplete="off">
    </div>

    <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan User</button>
    </div>
  </form>
@endsection

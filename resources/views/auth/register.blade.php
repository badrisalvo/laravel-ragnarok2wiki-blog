@extends('layouts.app')

@section('content')
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="unique_code">Unique Code</label>
                            <input id="unique_code" type="text" class="form-control @error('unique_code') is-invalid @enderror" name="unique_code" value="{{ old('unique_code') }}" required>

                            @error('unique_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="tipe" type="hidden" name="tipe" value="2">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">Input Password..</small>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                {{ __('Login') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>

<br><center><p>Created by <a href='http://facebook.com/badrisalvo' title='ZhongTian' target='_blank'>Ragnarok 2 Mastery Developer</a></p></center>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="floating-window closed" id="floatingWindow">
    <div class="toggle-buttonz" id="toggleButtonz">
            <img src="{{ asset('/img/ro2logo.png') }}" alt="" id="" class="iconz">
        </div>
    </div>>
    
    @endsection

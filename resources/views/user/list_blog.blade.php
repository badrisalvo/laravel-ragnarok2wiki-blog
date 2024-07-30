@extends('template_frontend.head')
@section('home')
<!--  -->
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2><br><br><br></h2>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="row">
                    @forelse ($data as $d)
                        <div class="col-lg-4">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        @if($d->category) <!-- Pengecekan apakah kategori tersedia -->
                                            <span>{{ $d->category->name }}</span>
                                        @else
                                            <!-- Tampilkan pesan alternatif jika kategori tidak tersedia -->
                                            <span>Category Not Available</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('blog.isi', $d->slug) }}">
                                        <img src="{{ asset($d->gambar) }}" alt="">
                                    </a>
                                </div>
                                <div class="down-content" style="background-color: rgba(0, 0, 0, 0.4);">
                                    <div class="date">
                                        <!-- Pengecekan apakah pengguna tersedia -->
                                        @if($d->user)
                                            <h6>{{ $d->created_at->isoFormat('dddd, D MMM Y') }} - {{ $d->user->name }}</h6>
                                        @else
                                            <h6>{{ $d->created_at->isoFormat('dddd, D MMM Y') }} - Unknown User</h6>
                                        @endif
                                    </div>
                                    <br>
                                    <h4>
                                        <a href="{{ route('blog.isi', $d->slug) }}">
                                            {{ Str::limit($d->judul, 25) }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <p class="text-center">No posts available.</p>
                        </div>
                    @endforelse
            </div>
            </div>
            <!--  -->
        </div>
    </div>
</section>
<center>{{ $data->links() }}</center>
@include('template_frontend.footer')
@endsection

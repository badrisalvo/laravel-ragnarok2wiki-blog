@extends('template_frontend.head')
@section('home')
<section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('assets/img/ro2.mp4') }}" type="video/mp4" />
    </video>

    <div class="video-overlay header-text text-terbang">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="caption">
                        <h2>Welcome to Ragnarok 2 Mastery</h2>
                        <p>This is made for Ragnarok 2 Advent of Valkyrie, NA Server 
                            <a rel="nofollow" href="https://www.playragnarok2.com" target="_blank">Warportal</a>. 
                            Have many useful tips for you in
                            <a rel="nofollow" href="#" target="_blank">Ragnarok 2</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="row carousel-container">
            <div class="col-lg-12">
                <div class="owl-service-item owl-carousel">
                    @php
                        if (!session()->has('shuffled_data')) {
                            $shuffledData = $data->shuffle();
                            session(['shuffled_data' => $shuffledData]);
                        } else {
                            $shuffledData = session('shuffled_data');
                        }
                    @endphp

                    @foreach ($shuffledData as $d)
                    <div class="meeting-item">
                        <div class="thumb">
                            <div class="price">
                                <!-- Pastikan category terkait benar -->
                                @if($d->category)
                                    <span>{{ $d->category->name }}</span>
                                @else
                                    <span>No Category</span>
                                @endif
                            </div>
                            <a href="{{ route('blog.isi', $d->slug) }}">
                                <img src="{{ asset($d->gambar) }}" alt="">
                            </a>
                        </div>
                        <div class="down-content" style="background-color: rgba(0, 0, 0, 0.4);">
                            <div class="date">
                                <h6>{{ $d->created_at->isoFormat('D MMM Y') }} - Posted by 
                                <!-- Pastikan user terkait benar -->
                                @if($d->user)
                                    {{ $d->user->name }}
                                @else
                                    Unknown
                                @endif
                                </h6>
                            </div>
                            <br>
                            <h4>
                                <a href="{{ route('blog.isi', $d->slug) }}">{{ Str::limit($d->judul, 25) }}</a>
                            </h4>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>New Post</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    @php
                    $latest_data = $data->take(6);
                    @endphp
                    @foreach ($latest_data as $d)
                    <div class="col-lg-4">
                        <div class="meeting-item">
                            <div class="thumb">
                                <div class="price">
                                    <!-- Pastikan category terkait benar -->
                                    @if($d->category)
                                        <span>{{ $d->category->name }}</span>
                                    @else
                                        <span>No Category</span>
                                    @endif
                                </div>
                                <a href="{{ route('blog.isi', $d->slug) }}">
                                    <img src="{{ asset($d->gambar) }}" alt="">
                                </a>
                            </div>
                            <div class="down-content" style="background-color: rgba(0, 0, 0, 0.4);">
                                <div class="date">
                                    <h6>{{ $d->created_at->isoFormat('dddd, D MMM Y') }} - 
                                    <!-- Pastikan user terkait benar -->
                                    @if($d->user)
                                        {{ $d->user->name }}
                                    @else
                                        Unknown
                                    @endif
                                    </h6>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('template_frontend.footer')
@endsection

@extends('template_frontend.head')
@section('home')
@if(isset($data))
    <section class="heading-page header-text" id="top" style="background-image: url('{{ asset($data->gambar) }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 rounded-background">
                    <h2>{{ $data->judul }}</h2>
                    @if($data->category)
                        <h6>{{ $data->category->name }}</h6>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="upcoming-meetings" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="meeting-single-item">
                        <div class="heading-page">
                            <div class="price">
                                <span>Ragnarok 2 : Mastery</span>
                                <div class="container" style="background-color: rgba(255, 255, 255, 0);">
                                    <br>
                                    <a href="{{ route('blog.isi', $data->slug) }}">
                                        <h4>{{ $data->judul }}</h4>
                                    </a>                                        
                                    <br>
                                    <div class="content-white-text">
                                        {!! $data->content !!}
                                    </div>
                                    <br>
                                    <a> {{ $data->created_at->isoFormat('D MMM Y') }} Posted By : </a>
                                        @if($data->user)
                                            <a id="user_name" style="font-weight: bold;">{{ $data->user->name }}</a>
                                        @else
                                            <a id="user_name" style="font-weight: bold;">Unknown</a>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-4" style="color: white;">
                    <div class="heading-page" style="color: white;">
                        <h3>Comments</h3>
                        @if($data->comments && $data->comments->count() > 0)
                            <div class="comments-container" style="max-height: 400px; overflow-y: auto;">
                                @foreach($data->comments->sortByDesc('created_at') as $comment)
                                    <div class="comment" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
                                        @if($comment->user)
                                            <a id="user_nick" style="font-weight: bold;">{{ $comment->user->name }}</a> says:
                                        @endif
                                        {{ $comment->comment }}
                                        <br>
                                        <small id="timing">Commented on {{ $comment->created_at->format('d M Y, H:i') }}</small>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No comments yet.</p>
                        @endif

                        @auth
                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <br>
                                <input type="hidden" name="post_id" value="{{ $data->id }}">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" rows="2" placeholder="Add a comment"></textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @else
                            <p style="color: white;">Please <a href="{{ route('auth.google') }}">login with Google</a> to leave a comment.</p>
                        @endauth
                    </div>
                </div>

<!--  -->
            </div>
        </div>
    </section>

    <br>

    <div class="container">
        <div class="row carousel-containerz" >
            <div class="section-heading">
                <h2>News</h2>
            </div>
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
                    @if(isset($shuffledData))
                        @foreach ($shuffledData as $d)
                            <div class="meeting-item">
                                <div class="thumb">
                                    <div class="price">
                                        @if($d->category)
                                            <span>{{ $d->category->name }}</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('blog.isi', $d->slug) }}">
                                        <img src="{{ asset($d->gambar) }}" alt="">
                                    </a>
                                </div>
                                <div class="down-content" style="background-color: rgba(0, 0, 0, 0.4);">
                                    <div class="date">
                                        <h6>{{ $d->created_at->isoFormat('D MMM Y') }} - Posted by 
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@else
    <p>404 Not Found.</p>
@endif

@include('template_frontend.footer')
@endsection

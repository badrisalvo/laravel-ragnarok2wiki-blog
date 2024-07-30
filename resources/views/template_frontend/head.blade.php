<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Ragnarok 2 Mastery</title>
    <link rel="shortcut icon" href="{{ asset('img/ro2logo.png') }}">

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-edu-meeting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

  </head>
  <style>
    ul {
        list-style-type: none; /* Menghilangkan bullet points */
        padding: 0; /* Menghilangkan padding default */
    }
    li {
        margin: 5px 0; /* Menambahkan margin vertikal antara item */
    }
	.item {
    display: flex;
    flex-direction: column;
    align-items: center;
	}

	.meeting-item {
    align-items: center;
	}


	.thumb img {
		max-width: 100%;
		max-height: 100%;
		width: 4000px;
		height: 100%;
	}
	.meeting-single-item {
    /* Optional styling for the container */
    color: white; /* Adjust text color for readability */
    background-size: cover;
    background-position: center;
    border-radius: 15px; /* Rounded corners */
    /* Additional styles as needed */
	}

	.heading-page {
		/* Optional styling for the heading */
		background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
		padding: 20px;
		border-radius: 15px; /* Rounded corners */
		/* Additional styles as needed */
	}

	.floating-window {
    position: fixed;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.4);
    border: 0px solid #ccc;
	border-radius: 15px;
    padding: 20px;
    z-index: 9999;
    width: 250px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.floating-window.closed {
    transform: translateY(-50%) translateX(-100%);
}

.categories {
    margin-bottom: 20px;
}

.categories h4 {
	color: white;
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
}

.categories ul {
    padding: 0;
    margin: 0;
}

.categories ul li {
    list-style: none;
    margin-bottom: 10px;
}

.categories ul li a {
    color: white;
    text-decoration: none;
}
.content-white-text, 
.content-white-text h1, 
.content-white-text h2, 
.content-white-text h3, 
.content-white-text h4, 
.content-white-text h5, 
.content-white-text h6, 
.content-white-text p, 
.content-white-text span, 
.content-white-text a, 
.content-white-text li {
    color: white;
}

.icon {
    width: 128px;
    height: 128px;
    cursor: pointer;
}
.iconz {
    width: 160px;
    height: 90px;
}

.toggle-button {
    position: absolute;
    top: 50%;
    right: -100px;
    transform: translateY(-50%);
}
.toggle-buttonz {
    position: absolute;
    top: 5%;
    right: -150px;
    transform: translateY(400%);
}
.logo-image {
    width: 100px;  /* Adjust the width to your desired size */
    height: auto; /* Maintain the aspect ratio */
    position: relative;
    left: 10px; /* Adjust this value to move it further to the left */
}
.logo {
    margin-left: -250px; /* Adjust this value to move it further to the left */
}
.rounded-background {
    background-color: rgba(0, 0, 0, 0.8);
    border-radius: 15px; /* Anda bisa menyesuaikan nilai ini sesuai kebutuhan */
    padding: 15px; /* Tambahkan padding jika diperlukan */
}
.carousel-container {
    margin-top: -450px; /* Nilai negatif untuk menaikkan posisi ke atas */
 /* Tambahkan padding bawah jika diperlukan */
}
.carousel-containerz {
    margin-top: -90px;
}
.text-terbang {
    margin-top: -450px; /* Nilai negatif untuk menaikkan posisi ke atas */
 /* Tambahkan padding bawah jika diperlukan */
}
#user_name {
    font-weight: bold;
    animation: colorChange 3s infinite;
}
#user_nick {
    font-weight: bold;
    color: green;
}
.content-white-text img {
    max-width: 100%;
    height: auto;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.zoom-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    overflow: hidden;
}

.zoom-overlay img {
    cursor: grab;
    max-width: none;
    width: auto;
    height: auto;
    transform-origin: center;
}


.comment {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}
#timing{
    color: yellow;
    font-size: 12px;
}
@keyframes colorChange {
    0% { color: red; }
    20% { color: orange; }
    40% { color: yellow; }
    60% { color: green; }
    80% { color: blue; }
    100% { color: purple; }
}
.header-area .search-form {
    flex-grow: 1;
    margin: 0px 20px 0; /* Adjust the margin as needed */
    display: flex;
    justify-content: center;
}

.header-area .search-form input[type="search"] {
    width: 100%;
    max-width: 300px; /* Limit the max-width */
    padding: 10px 20px; /* Adjust the padding */
    border: 1px solid #ccc;
    border-radius: 4px; /* Rounded corners */
    padding bottom: 3px;
}
section.upcoming-meetings {
    position: relative; /* Untuk memastikan pseudo-element diposisikan relatif ke elemen ini */
    padding-top: 15px;
    padding-bottom: 10px;
    overflow: hidden; /* Untuk memastikan pseudo-element tidak keluar dari batas section */
}
.note-video-clip {
    width: 320px;
    height: 180px; /* 100% tinggi viewport */
    margin: 0 auto;
    position: relative;
    overflow: hidden;
}

.note-video-clip video {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Menyesuaikan ukuran video agar menutupi wadah */
}


section.upcoming-meetings::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url(../img/yggdrasil.jpg);
    background-position: center center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.5; /* Ubah nilai ini untuk mengatur tingkat opacity */
    z-index: -1; /* Pastikan pseudo-element berada di belakang konten */
}
	</style>
	
<body>
    
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container" >
          <div class="row">
              <div class="col-12" >
                  <nav class="main-nav" >
                      <!-- ***** Logo Start ***** -->
                      <a href="/home" class="logo">
						<img src="{{ asset('img/ro2logo.png') }}" alt="Ragnarok 2 Advent of Valkyrie" class="logo-image">
                        RO2 Mastery
                      </a>
                      
                      <!-- ***** Logo End ***** -->
                      
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                      <form action="{{ route('blog.cari') }}" method="GET" class="search-form">
                        <input class="input" type="search" name="cari" placeholder="Search..." aria-label="Search">
                    </form>
                          <li><a href="{{ url('/') }}">Home</a></li>
                          <li class="has-sub">
                            <a href="javascript:void(0)">Pages</a>
                            <ul class="sub-menu">
                              @foreach ($category_widget as $hasil)
                              <li><a href="{{ route('blog.category', $hasil->slug) }}">{{ $hasil->name }}</a></li>
                              @endforeach
                            </ul>
                        </li>

                        @auth
                    @if (Auth::user()->tipe != 3)
                        <li><a href="{{ url('/home') }}">Admin Page</a></li>
                        <li><a class="total-visitors">Visitors : {{ $totalVisitors }}</a></li>
                    @endif
                    <li class="has-sub">
                        <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                        <ul class="sub-menu">
                            <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @endauth
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
	  <!--  -->
	  <div class="floating-window closed" id="floatingWindow">
    <div class="categories">
        <h4>Wiki Categories</h4>
        <ul>
            @foreach ($category_widget as $hasil)
            <li><a href="{{ route('blog.category', $hasil->slug) }}">{{ $hasil->name }} ( {{ $hasil->posts->count() }} )</a></li>
            @endforeach
        </ul>
    </div>
    <div class="toggle-button" id="toggleButton">
        <img src="{{ asset('assets/img/kiri.png') }}" alt="Open" id="openIcon" class="icon">
        <img src="{{ asset('assets/img/kanan.png') }}" alt="Close" id="closeIcon" class="icon" style="display: none;">
    </div>
    
</div>
<div class="floating-window closed" id="floatingWindow">
<div class="toggle-buttonz" id="toggleButtonz">
        <img src="{{ asset('/img/ro2logo.png') }}" alt="" id="" class="iconz">
    </div>
</div>
<!--  -->
  </header>
  
  @yield('home')
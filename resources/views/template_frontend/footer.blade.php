<section class="contact-us">
    <div class="footer">
          <p>Copyright &copy; Ragnarok 2 Mastery <br> @if(date('Y') == '2024') {{ date('Y') }} @else 2024 - {{ date('Y') }} @endif All Rights Reserved</p>
          <audio id="background-music" autoplay loop>
        <source src="{{ asset('audio/payontheme.mp3') }}" type="audio/mpeg">
    </audio>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
// Mengatur navigasi aktif pada halaman pertama
$('.nav li:first').addClass('active');

var showSection = function showSection(section, isAnimate) {
    var direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

    if (isAnimate) {
        $('body, html').animate({
            scrollTop: reqSectionPos
        }, 800);
    } else {
        $('body, html').scrollTop(reqSectionPos);
    }
};

var checkSection = function checkSection() {
    $('.section').each(function () {
        var $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();

        if (topEdge < wScroll && bottomEdge > wScroll) {
            var currentId = $this.data('section'),
                reqLink = $('a').filter('[href*=\\#' + currentId + ']');
            reqLink.closest('li').addClass('active')
                .siblings().removeClass('active');
        }
    });
};

$('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
    e.preventDefault();
    showSection($(this).attr('href'), true);
});

$(window).scroll(function () {
    checkSection();
});


document.addEventListener('DOMContentLoaded', function () {
            var floatingWindow = document.getElementById('floatingWindow');
            var toggleButton = document.getElementById('toggleButton');
            var openIcon = document.getElementById('openIcon');
            var closeIcon = document.getElementById('closeIcon');

            toggleButton.addEventListener('click', function () {
                if (floatingWindow.classList.contains('closed')) {
                    floatingWindow.classList.remove('closed');
                    openIcon.style.display = 'none';
                    closeIcon.style.display = 'block';
                } else {
                    floatingWindow.classList.add('closed');
                    openIcon.style.display = 'block';
                    closeIcon.style.display = 'none';
                }
            });

            var video = document.getElementById('video');
            if (video) {
                video.addEventListener('dblclick', function () {
                    if (video.requestFullscreen) {
                        video.requestFullscreen();
                    } else if (video.mozRequestFullScreen) { /* Firefox */
                        video.mozRequestFullScreen();
                    } else if (video.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
                        video.webkitRequestFullscreen();
                    } else if (video.msRequestFullscreen) { /* IE/Edge */
                        video.msRequestFullscreen();
                    }
                });
            }

            var images = document.querySelectorAll('.content-white-text img');
            images.forEach(function (image) {
                image.addEventListener('click', function () {
                    if (document.querySelector('.zoom-overlay')) {
                        document.querySelector('.zoom-overlay').remove();
                    } else {
                        var overlay = document.createElement('div');
                        overlay.classList.add('zoom-overlay');

                        var zoomedImage = this.cloneNode(true);
                        overlay.appendChild(zoomedImage);
                        document.body.appendChild(overlay);

                        overlay.addEventListener('click', function (e) {
                            if (e.target !== zoomedImage) {
                                overlay.remove();
                            }
                        });

                        let isPanning = false;
                        let startX = 0;
                        let startY = 0;
                        let scrollLeft = 0;
                        let scrollTop = 0;

                        zoomedImage.addEventListener('mousedown', function (e) {
                            isPanning = true;
                            startX = e.pageX - overlay.offsetLeft;
                            startY = e.pageY - overlay.offsetTop;
                            scrollLeft = overlay.scrollLeft;
                            scrollTop = overlay.scrollTop;
                            zoomedImage.style.cursor = 'grabbing';
                        });

                        document.addEventListener('mousemove', function (e) {
                            if (!isPanning) return;
                            e.preventDefault();
                            const x = e.pageX - startX;
                            const y = e.pageY - startY;
                            overlay.scrollLeft = scrollLeft - x;
                            overlay.scrollTop = scrollTop - y;
                        });

                        document.addEventListener('mouseup', function () {
                            isPanning = false;
                            zoomedImage.style.cursor = 'grab';
                        });

                        let scale = 1;
                        zoomedImage.addEventListener('wheel', function (e) {
                            e.preventDefault();
                            const zoomSpeed = 0.1;
                            const rect = zoomedImage.getBoundingClientRect();

                            // Calculate the new scale
                            scale += e.deltaY * -zoomSpeed;
                            scale = Math.min(Math.max(0.125, scale), 4);

                            // Calculate the mouse position relative to the image
                            const mouseX = (e.clientX - rect.left) / rect.width;
                            const mouseY = (e.clientY - rect.top) / rect.height;

                            // Apply the transform origin
                            zoomedImage.style.transformOrigin = `${mouseX * 100}% ${mouseY * 100}%`;
                            zoomedImage.style.transform = `scale(${scale})`;
                        });

                        // Ensure the image is centered initially
                        setTimeout(() => {
                            overlay.scrollLeft = (zoomedImage.width * scale - overlay.clientWidth) / 2;
                            overlay.scrollTop = (zoomedImage.height * scale - overlay.clientHeight) / 2;
                        }, 0);
                    }
                });
            });

            // Autoplay Audio
            var audio = document.getElementById('background-music');
            if (audio) {
                var playPromise = audio.play();
                if (playPromise !== undefined) {
                    playPromise.then(function () {
                        console.log("Audio is playing");
                    }).catch(function (error) {
                        console.log("Auto-play was prevented:", error);
                        // Optional: Add a play button for manual start
                        var playButton = document.createElement('button');
                        playButton.textContent = 'Play Music';
                        playButton.onclick = function () {
                            audio.play();
                        };
                        document.body.appendChild(playButton);
                    });
                }
            }
        });
    </script>
	</body>
	</body>
	
</html>
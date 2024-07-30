<footer class="main-footer">
  <div class="footer-left">
    Developer &copy;
    @if (date('Y') == '2024')
      {{ date('Y') }}
    @else
      2024 - {{ date('Y') }}
    @endif
    reserved by <a href="http://facebook.com/badrisalvo" target="_blank">Ragnarok 2 Mastery Developer</a>
    
  </div>
</footer>
</div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var sidebarToggle = document.getElementById('sidebarToggle');
    var sidebar = document.querySelector('.main-sidebar');
    var content = document.getElementById('content');

    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('closed');
        content.classList.toggle('full');
    });
});
document.getElementById("openSidebarBtn").addEventListener("click", function() {
            var sidebar = document.getElementById("mySidebar");
            var mainContent = document.getElementById("mainContent");
            var closeBtn = document.getElementById("closeSidebarBtn");
            var openBtn = document.getElementById("openSidebarBtn");
            sidebar.style.width = "250px";
            mainContent.style.marginLeft = "250px";
            openBtn.style.display = "none";
            closeBtn.style.display = "inline-block";
        });

        document.getElementById("closeSidebarBtn").addEventListener("click", function() {
            var sidebar = document.getElementById("mySidebar");
            var mainContent = document.getElementById("mainContent");
            var closeBtn = document.getElementById("closeSidebarBtn");
            var openBtn = document.getElementById("openSidebarBtn");
            sidebar.style.width = "0";
            mainContent.style.marginLeft = "0";
            closeBtn.style.display = "none";
            openBtn.style.display = "inline-block";
        });
</script>
<!-- General JS Scripts -->
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>

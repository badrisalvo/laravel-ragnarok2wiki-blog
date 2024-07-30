<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ url('/') }}">Ro2 Mastery Admin Page</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('/') }}">RO2</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Admin Page</li>
      <li class="active"><a class="nav-link" href="{{ url('/') }}"><i class="fas fa-fire"></i> <span>Home - Web</span></a></li>
      <li class="menu-header">Starter</li>
      <li class="active"><a class="nav-link" href="{{ route('post.index') }}"><i class="fas fa-fire"></i> <span>List Post</span></a></li>
      <li class="active"><a class="nav-link" href="{{ route('post.tampil_hapus') }}"><i class="fas fa-fire"></i> <span>List Post Dihapus</span></a></li>
      @if(Auth::user() && Auth::user()->isAdmin())
        <li class="active"><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-fire"></i> <span>List Category</span></a></li>
        <li class="active"><a class="nav-link" href="{{ route('tag.index') }}"><i class="fas fa-fire"></i> <span>List Tag</span></a></li>
        <li class="active"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-fire"></i> <span>List User</span></a></li>
      @endif
    </ul>
  </aside>
</div>

<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/">Peminjaman Ruang</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/">PR</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link {{Request::is('/') ? 'active' : ' '}}" href="/"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
      <li class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/master/ruang">Ruang</a></li>
          <li><a class="nav-link" href="/master/fasilitas">Fasilitas</a></li>
          <li><a class="nav-link" href="/master/transaksi">Transaksi Peminjaman</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>

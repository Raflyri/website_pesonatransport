<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
      <img src="<?= base_url(get_setting('site_icon', 'admin_assets/img/AdminLTELogo.png')) ?>"
        alt="<?= get_setting('site_name', 'Pesona Transport') ?>"
        class="brand-image opacity-75 shadow"
        style="max-height: 33px;"> <span class="brand-text fw-light"><?= get_setting('site_name', 'Pesona Transport') ?></span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" data-accordion="false">

        <li class="nav-item">
          <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-header">MANAJEMEN KONTEN</li>

        <li class="nav-item">
          <a href="<?= base_url('admin/banners') ?>" class="nav-link">
            <i class="nav-icon bi bi-images"></i>
            <p>Banner Slider</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/services') ?>" class="nav-link">
            <i class="nav-icon bi bi-grid-fill"></i>
            <p>Layanan & Service</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('admin/profile') ?>" class="nav-link <?= (current_url() == base_url('admin/profile')) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-building"></i>
            <p>Profil Perusahaan</p>
          </a>
        </li>

        <li class="nav-header">ARMADA</li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-car-front-fill"></i>
            <p>
              Data Armada
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/fleets') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>List Mobil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/categories') ?>" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Kategori Mobil</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">PUBLIKASI</li>

        <li class="nav-item">
          <a href="<?= base_url('admin/news') ?>" class="nav-link">
            <i class="nav-icon bi bi-newspaper"></i>
            <p>Berita / Artikel</p>
          </a>
        </li>

        <li class="nav-header">AKUN</li>
        <li class="nav-item">
          <a href="<?= base_url('admin/settings') ?>" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>Pengaturan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
            <i class="nav-icon bi bi-box-arrow-right"></i>
            <p>Logout</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>
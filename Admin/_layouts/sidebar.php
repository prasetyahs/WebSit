<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= templates() ?>index3.html" class="brand-link">
    <img src="<?= templates() ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">S.I.T</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?= url('beranda') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Halaman Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php if ($_SESSION['level'] == 'kurir') { ?>
              <li class="nav-item">
                <a href="<?= url('Pengiriman') ?>" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Pengiriman</p>
                </a>
              </li>
            <?php } ?>
            <?php if ($_SESSION['level'] == "admin" || $_SESSION['level'] == 'pegawai') { ?>
              <li class="nav-item">
                <a href="<?= url('Admin') ?>" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= url('kurir') ?>" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>Kurir</p>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="<?= url('barang') ?>" class="nav-link">
                <i class="fas fa-box nav-icon"></i>
                <p>barang</p>
              </a>
            </li>
            <?php if ($_SESSION['level'] == "admin" || $_SESSION['level'] == 'pegawai') { ?>
              <li class="nav-item">
                <a href="<?= url('pengirim') ?>" class="nav-link">
                  <i class="fas fa-people-carry nav-icon"></i>
                  <p>pengirim</p>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="<?= url('tracking') ?>" class="nav-link">
                <i class="fas fa-route nav-icon"></i>
                <p>Tracking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= url('status') ?>" class="nav-link">
                <i class="fas fa-shipping-fast nav-icon"></i>
                <p>Resi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= url('laporan') ?>" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
                <p>Laporan</p>
              </a>
            </li>



          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= url('leaflet-routingmachine') ?>" class="nav-link">
            <i class="fa fa-map-marker nav-icon"></i>
            <p>Maps</p>
          </a>
        </li>





      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
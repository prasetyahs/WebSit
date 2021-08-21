<?php
$title = "Data Status";
$judul = $title;
?>
<!-- Main content -->
<?php
// https://www.malasngoding.com
// menghubungkan dengan koneksi database

include('../database/koneksi.php');

// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(id_resi) as kodeTerbesar FROM  tbl_resi");
$data = mysqli_fetch_array($query);
$kodeRs = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeRs, 3, 5);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "RS";
$kodeRs = $huruf . sprintf("%04s", $urutan);
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= url('proses/sresi') ?>" method="post" class="needs-validation">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>ID Resi</label>

                    <input type="email" class="form-control" name="kodres" style="width: 100%;" value="<?php echo $kodeRs ?>" readonly>

                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Tanggal Di kirim</label>
                    <input type="date" class="form-control" name="tglA" style="width: 100%;">
                  </div>
                  <div class="form-group">
                    <label>Estimasi di terima</label>
                    <input type="date" class="form-control" name="tglK" style="width: 100%;" placeholder="Enter email">
                  </div>
                  <div class="form-group ">
                    <label for="kodbr">ID Barang</label>
                    <select class="form-control" type="text" name="kodbar" id="kodbr">
                      <option value="">--Pilih--</option>
                      <?php
                      include('../database/koneksi.php');
                      $query    = mysqli_query($koneksi, "SELECT * FROM tbl_barang GROUP BY id_barang ORDER BY id_barang");
                      while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <option value="<?= $data['id_barang']; ?>"><?php echo $data['id_barang'] . ' - ' . $data['nama_barang']; ?></option>
                      <?php
                      }
                      ?>

                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>

                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group ">
                    <label for="kodbr">ID Pengirim</label>
                    <select class="form-control" type="text" name="kodpeng" id="kodpng">
                      <option value="">--Pilih--</option>
                      <?php
                      include('../database/koneksi.php');
                      $query    = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");

                      while ($data = mysqli_fetch_array($query)) {
                      ?>
                        <option value="<?= $data['id_kurir']; ?>"><?php echo $data['nama']; ?></option>
                      <?php
                      }
                      ?>

                    </select>
                  </div>
                  <!-- /.form-group -->
                  <form action="" method="get">
                    <div class="form-group ">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="On Proses">On Proses</option>
                        <option value="Di Terima">Di Terima</option>
                        <option value="Batal">Batal</option>
                      </select>
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-12">
                      <a href="<?= url('status') ?>" class="btn btn-secondary ">Cancel</a>
                      <input type="submit" value="Simpan" class="btn btn-success float-right">
                    </div>
                  </div>

                  <!-- /.form-group -->
                </div>
                <!-- /.col -->

              </div>
              <!-- /.row -->
</section>
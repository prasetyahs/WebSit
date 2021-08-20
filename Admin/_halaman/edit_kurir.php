<?php
include '../database/koneksi.php';
include 'proses/crud.php';

$title = "Data Kurir";
$judul = $title;
$id = $_GET['id'];
$data = readDataPerRow($koneksi,"SELECT * FROM tbl_kurir WHERE id_kurir = '$id'");
$splitName = explode(' ',$data['nama']);
$firstName = $splitName[0];
$lastName = $splitName[1];

if(isset($_POST['submit'])){
    $_POST['nama'] = $_POST['firstName'] . ' '. $_POST['lastName'];
    unset($_POST['firstName']);
    unset($_POST['lastName']);
    unset($_POST['submit']);

    $where = [
        'username' => $_POST['username']
    ];

    $updateCourier = update($_POST,$where,'tbl_kurir',$koneksi);
    header("location:http://localhost/WebSit/Admin/?halaman=kurir");

}
?>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Kurir</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action=''>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" value="<?= $data['username'] ?>" readonly class="form-control" style="width: 100%;" placeholder="Enter Username" required>

                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?= $data['password'] ?>" class="form-control" style="width: 100%;" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Awal</label>
                    <input type="text" name="firstName" value="<?= $firstName ?>" class="form-control" style="width: 100%;" required placeholder="Enter Nama">
                  </div>
                  <div class="form-group">
                    <label>Nama Akhir</label>
                    <input type="text" name="lastName" value="<?= $lastName ?>" class="form-control" style="width: 100%;" placeholder="Enter Last Name" required>
                  </div>
                  <!-- /.form-group -->
                </div>

                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?= $data['alamat'] ?></textarea>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Email</label>
                    <input required type="email" name="email" value="<?= $data['email'] ?>" class="form-control" id="exampleInputEmail1" style="width: 100%;" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>No Hp</label>
                    <input type="number" name="nohp" class="form-control" value="<?= $data['nohp'] ?>" style="width: 100%;" placeholder="Enter Phone Number " required>
                  </div>
                  <div class="form-group">
                    <label>No Identitas</label>
                    <input type="number" name="no_identitas" class="form-control" value="<?= $data['no_identitas'] ?>" style="width: 100%;" placeholder="Enter Identity Number " required>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <a href="<?= url('kurir') ?>" class="btn btn-secondary ">Cancel</a>
                      <input type="submit" name="submit" value="Simpan" class="btn btn-success float-right">
                    </div>
                  </div>
          </form>

          <!-- /.form-group -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
</section>


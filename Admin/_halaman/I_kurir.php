<?php
$title = "Data Kurir";
$judul = $title;




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
          <form method="post" action='../Admin/_halaman/proses/add-kurir.php'>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" class="form-control" style="width: 100%;" placeholder="Enter Username" required>

                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" style="width: 100%;" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Awal</label>
                    <input type="text" name="firstName" class="form-control" style="width: 100%;" required placeholder="Enter Nama">
                  </div>
                  <div class="form-group">
                    <label>Nama Akhir</label>
                    <input type="text" name="lastName" class="form-control" style="width: 100%;" placeholder="Enter Last Name" required>
                  </div>
                  <!-- /.form-group -->
                </div>

                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Email</label>
                    <input required type="email" name="email" class="form-control" id="exampleInputEmail1" style="width: 100%;" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>No Hp</label>
                    <input type="number" name="nohp" class="form-control" style="width: 100%;" placeholder="Enter Phone Number " required>
                  </div>
                  <div class="form-group">
                    <label>No Identitas</label>
                    <input type="number" name="no_identitas" class="form-control" style="width: 100%;" placeholder="Enter Identity Number " required>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <a href="<?= url('kurir') ?>" class="btn btn-secondary ">Cancel</a>
                      <input type="submit" value="Simpan" class="btn btn-success float-right">
                    </div>
                  </div>
          </form>

          <!-- /.form-group -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
</section>
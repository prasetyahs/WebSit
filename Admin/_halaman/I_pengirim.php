<?php
    $title="Iput Data";
    $judul=$title;
  ?>
    <?php
    // https://www.malasngoding.com
    // menghubungkan dengan koneksi database
    
    include('../database/koneksi.php');
    
    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(id_pengirim) as kodeTerbesar FROM tbl_pengirim");
    $data = mysqli_fetch_array($query);
    $kodePengirim = $data['kodeTerbesar'];
 
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodePengirim, 3, 5);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "P";
    $kodePengirim = $huruf . sprintf("%05s", $urutan);
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
               
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="<?=url('proses/spengirim')?>" method="post" class="needs-validation" >
            <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>ID Pengirim</label>
                  <input type="text" class="form-control" name="kodpeng" style="width: 100%;"  value="<?php echo $kodePengirim ?>"readonly  >
                 
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control"   name="nama"  style="width: 100%;"  placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control"  name="alamat"  style="width: 100%;"  placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>No Telphone</label>
                  <input type="integer" class="form-control" name="tlpn" style="width: 100%;"  placeholder="Enter text">
                </div>
                <!-- /.form-group -->
              

              
                  <a href="<?=url('pengirim')?>" class="btn btn-secondary ">Cancel</a>
                  <input type="submit" value="Simpan" class="btn btn-success float-right">
                </div>
              </div>
                      
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              
            </div>
            <!-- /.row -->
                </section>
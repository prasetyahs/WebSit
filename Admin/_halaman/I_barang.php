
<?php
    $title="Data Barang";
    $judul=$title;
  ?>
  <?php
    // https://www.malasngoding.com
    // menghubungkan dengan koneksi database
    
    include('../database/koneksi.php');
    
    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(id_barang) as kodeTerbesar FROM tbl_barang");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
 
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBarang, 3, 5);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "BWH";
    $kodeBarang = $huruf . sprintf("%05s", $urutan);
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=url('proses/sbarang')?>" method="post" class="needs-validation" >
              <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>ID Barang</label>
                  <input type="text" class="form-control" name="kodbar"   style="width: 100%;"  value="<?php echo $kodeBarang ?>"readonly>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control"  name="namabarang" style="width: 100%;" >
                </div>
                <div class="form-group">
                  <label>Jenis Barang</label>
                  <input type="text" class="form-control" name="jenisbarang"  style="width: 100%;"  placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>Berat</label>
                  <input type="text" class="form-control" name="berat"  style="width: 100%;"  >
                </div>
                <div class="form-group">
                  <label>Qty</label>
                  <input type="integer" class="form-control" name="qty"  style="width: 100%;"  >
                </div>
                <div class="form-group ">
                                    <label>Jenis Packing</label>
                                    <select class="form-control" name="jenispacking" >
                                      <option value="">--Pilih--</option>
                                      <option value="Palet">Palet</option>
                                      <option value="Box">Box</option>
                                      <option value="Plastik">Plastik</option>
                                     
                                    </select>
                                  </div>
                <!-- /.form-group -->
              </div>

              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tujuan</label>
                  <input type="text" class="form-control" name="tujuan"  style="width: 100%;"  >
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Penerima</label>
                  <input type="text" class="form-control" name="penerima"  style="width: 100%;"  >
                </div>
                <div class="form-group">
                  <label>Alamat Penerima</label>
                  <input type="text" class="form-control" name="alamat"  style="width: 100%;"  >
                </div>
                <div class="form-group">
                  <label>No hanphone</label>
                  <input type="integer" class="form-control" name="nohp"  style="width: 100%;"  >
                </div>

                

                <div class="row">
                <div class="col-12">
                  <a href="<?=url('barang')?>" class="btn btn-secondary ">Cancel</a>
                  <input type="submit" value="Simpan" class="btn btn-success float-right">
                </div>
              </div>
                      
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              
            </div>
            <!-- /.row -->
                </section>
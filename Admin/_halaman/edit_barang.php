
<?php
  $title = "Data Barang";
  $judul = $title;
  include 'koneksi.php';
  include 'crud.php';
  
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
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
             
                include "koneksi.php";
            
                $id = $_GET['id'];
                $result = mysqli_query($koneksi, "SELECT * FROM `tbl_barang` WHERE id_barang='$id'");
                 while($data = mysqli_fetch_assoc($result)){
                 ?>
              <form action="_halaman/proses/update_rs.php" method="post"  >
             
              <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>ID Barang</label>
                  <input type="text" class="form-control" name="kodbar"   style="width: 100%;"  value="<?php echo $data['id_barang'] ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control"  name="nama_barang" style="width: 100%;"  value="<?php echo $data['nama_barang'] ?>">
                </div>
                <div class="form-group">
                  <label>Jenis Barang</label>
                  <input type="text" class="form-control" name="jenis_barang"  style="width: 100%;"  value="<?php echo $data['jenis_barang'] ?>">
                </div>
                <div class="form-group">
                  <label>Berat</label>
                  <input type="text" class="form-control" name="berat"  style="width: 100%;"  value="<?php echo $data['berat'] ?>" >
                </div>
                <div class="form-group">
                  <label>Qty</label>
                  <input type="integer" class="form-control" name="qty"  style="width: 100%;"  value="<?php echo $data['qty'] ?>" >
                </div>
                <div class="form-group ">
                                    <label>Jenis Packing</label>
                                    <select class="form-control" name="jenis_packing"  >
                                      <option value="<?php echo $data['jenis_packing'] ?>">--Pilih--</option>
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
                  <input type="text" class="form-control" name="tujuan"  style="width: 100%;"  value="<?php echo $data['tujuan'] ?>" >
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Penerima</label>
                  <input type="text" class="form-control" name="penerima"  style="width: 100%;"  value="<?php echo $data['penerima'] ?>" >
                </div>
                <div class="form-group">
                  <label>Alamat Penerima</label>
                  <input type="text" class="form-control" name="alamat"  style="width: 100%;"  value="<?php echo $data['alamat_penerima'] ?>" >
                </div>
                <div class="form-group">
                  <label>No hanphone</label>
                  <input type="integer" class="form-control" name="nohp"  style="width: 100%;"  value="<?php echo $data['nohp'] ?>" >
                </div>

                

                <div class="row">
                <div class="col-12">
               
                  <input type="submit" value="Simpan" class="btn btn-success float-right">
                </div>
              </div>
                      
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
             
            </div>
            </form>
            <?php } ?>
            <!-- /.row -->
                </section>
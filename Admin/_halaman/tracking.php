<?php
    $title="Data Tracking";
    $judul=$title;
  ?>
<?php
include '../database/koneksi.php';
?>
<section class="content">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Resi</th>
                  <th>Pengrim</th>
                  <th>Alamat Pengrim</th>
                  <th>No Telphone</th>
                  <th>Penerima</th>
                  <th>Alamat Penerima</th>
                  <th>No Telphone</th>
                  <th>Nama Barang</th>
                  <th>Berat</th>
                  <th>Qty</th>
                  <th>Tanggal pengiriman</th>
                  <th>status</th>
                </tr>
                </thead>
                <tbody>
                
            <?php
            $no = 1;
            $resi = mysqli_query($koneksi,"SELECT * FROM tbl_resi
                        INNER JOIN tbl_barang ON tbl_resi.id_barang =tbl_barang.id_barang
                        INNER JOIN tbl_kurir ON tbl_resi.id_pengirim =tbl_kurir.id_kurir");
                        
            while($b = mysqli_fetch_array($resi)){
                ?>
                <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $b['id_resi']; ?></td>
                <td><?php echo $b['nama']; ?></td>
                <td><?php echo $b['alamat']; ?></td>
                <td><?php echo $b['nohp']; ?></td>
                <td><?php echo $b['penerima']; ?></td>
                <td><?php echo $b['alamat_penerima']; ?></td>
                <td><?php echo $b['nohp']; ?></td>
                <td><?php echo $b['nama_barang']; ?></td>
                <td><?php echo $b['berat']; ?></td>
                <td><?php echo $b['qty']; ?></td>
                <td><?php echo $b['Tglambil']; ?></td>
                <td><?php echo $b['status']; ?></td>
                
                <?php 
                  }
                  ?>
                </tfoot>
              </table>
              
            </div>
           
            <!-- /.card-body -->
          </div>
        </div>
      </div>
          <!-- /.card -->
          </div>
      <!-- /.row -->
    </section>
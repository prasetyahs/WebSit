<?php
$title = "Data Barang";
$judul = $title;
include 'koneksi.php';
include 'crud.php';

$session = $_SESSION['level'];
if ($session == 'kurir') {
  $id_kurir = $_SESSION['id_kurir'];
  $data = readDataAllRow($koneksi, "SELECT * FROM tbl_resi 
                                          JOIN tbl_barang ON tbl_resi.id_barang = tbl_barang.id_barang 
                                          WHERE id_pengirim = '$id_kurir'");
} else {
  $data = readDataAllRow($koneksi, "select * from tbl_barang");
}

?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Barang</h3>

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
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Berat</th>
                <th>Qty</th>
                <th>Jenis Packing</th>
                <th>Tujuan </th>
                <th>Penerima</th>
                <th>Alamat penerima</th>
                <th>No Telphone</th>
                <th>Action</th>


              </tr>
            </thead>
            <tbody>
              <?php

              $no = 1;
              // $data = mysqli_query($koneksi,"select * from tbl_barang");
              // while($d = mysqli_fetch_array($data)){
              foreach ($data as $d) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['id_barang']; ?></td>
                  <td><?php echo $d['nama_barang']; ?></td>
                  <td><?php echo $d['jenis_barang']; ?></td>
                  <td><?php echo $d['berat']; ?></td>
                  <td><?php echo $d['qty']; ?></td>
                  <td><?php echo $d['jenis_packing']; ?></td>
                  <td><?php echo $d['tujuan']; ?></td>
                  <td><?php echo $d['penerima']; ?></td>
                  <td><?php echo $d['alamat_penerima']; ?></td>
                  <td><?php echo $d['nohp']; ?></td>
                  <td>
                    <div class="d-flex justify-content-between">
                      <a class="fa fa-edit text-green pr-3" href="<?= url('edit_barang',"",$d['id_barang'])?>">Edit </a>
                      <a class="fa fa-trash text-danger" href="_halaman/proses/delete-barang.php?id_barang=<?php echo $d['id_barang']; ?>">Delete </a>
                    </div>
                  </td>
                </tr>

                </tr>
              <?php
              }
              ?>
              </tfoot>
          </table>

        </div>

        <!-- /.card-body -->
      </div>
      <div class="row">
        <div class="col-12">

          <a type="submit" class="btn btn-success float-right" href="<?= url('I_barang') ?>">+ TAMBAH DATA</a>


        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.row -->
</section>
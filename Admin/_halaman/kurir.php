<?php
$title = "Data Kurir";
$judul = $title;
include '../database/koneksi.php';
include '../proses/crud.php';

$data = readDataAllRow($koneksi, "SELECT * FROM tbl_kurir");
?>

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Responsive Hover Table</h3>

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
                <th>ID Kurir</th>
                <th>Nama Kurir</th>
                <th>Alamat</th>
                <th>No Hanphone</th>
                <th>No Sim/KTP</th>


              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
              </tr>

              </tfoot>
          </table>

        </div>

        <!-- /.card-body -->
      </div>
      <div class="row">
        <div class="col-12">

          <a type="submit" class="btn btn-success float-right" href="<?= url('I_kurir') ?>">+ TAMBAH DATA</a>


        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.row -->
</section>
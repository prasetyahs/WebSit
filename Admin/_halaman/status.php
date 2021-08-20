<?php
$title = "Data Status";
$judul = $title;
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
                <th>Id Resi</th>
                <th>Tanggal di kirim</th>
                <th>Estimasi di terima</th>
                <th>Kode Barang</th>
                <th>Kode Pengirim</th>
                <th>Status</th>
                <th>Edit Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../database/koneksi.php';
              $no = 1;
              if ($_SESSION['level'] == 'kurir') {

                $id = $_SESSION['id_kurir'];
                $data = mysqli_query($koneksi, "select * from tbl_resi where id_pengirim = '$id' ");
              } else {
                $data = mysqli_query($koneksi, "select * from tbl_resi");
              }
              while ($d = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['id_resi']; ?></td>
                  <td><?php echo $d['Tglambil']; ?></td>
                  <td><?php echo $d['Tglkirim']; ?></td>
                  <td><a href="<?= url('barang') ?>"><?php echo $d['id_barang']; ?></td>
                  <td><a href="<?= url('pengirim') ?>"><?php echo $d['id_pengirim']; ?></td>
                  <td><?php echo $d['status']; ?></td>
                  <td><button onclick="getId('<?= $d['id_resi'] ?>')" type="button" data-toggle="modal" data-target="#modalEditStatus" class="btn btn-warning"><i style="color:white" class="fa fa-edit"></i></button></td>
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
          <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'pegawai') { ?>
            <a type="submit" class="btn btn-success float-right" href="<?= url('I_resi') ?>">+ TAMBAH DATA</a>
          <?php  } ?>

        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.row -->
</section>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modalEditStatus" tabindex="-1" role="dialog" aria-labelledby="modalEditStatusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditStatusLabel">Edit Status Pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../Admin/_halaman/proses/update-status.php" method="post">
          <div class="form-group ">
            <input type="hidden" id="id_resi" name="id_resi">
            <label>Status</label>
            <select class="form-control" name="status">
              <option value="">--Pilih--</option>
              <option value="Sedang Mengirim">Sedang Mengirim</option>
              <option value="Di Terima">Di Terima</option>
              <option value="Batal">Batal</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="edit" type="submit" class="btn btn-primary">Save changes</a>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  function getId(id) {
    $('#id_resi').val(id);
  }
</script>
<?php
$title = "Data Kurir";
$judul = $title;
include '../database/koneksi.php';
include 'proses/crud.php';

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
                <th>Nama Kurir</th>
                <th>Email</th>
                <th>No Hanphone</th>
                <th>No Sim/KTP</th>
                <th>Alamat</th>
                <th>Action</th>


              </tr>
            </thead>
            <tbody>
              <?php $i =1; foreach($data as $dt){ ?>
                <?php $id_kurir = $dt['id_kurir'] ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $dt['nama'] ?></td>
                <td><?= $dt['email'] ?></td>
                <td><?= $dt['nohp'] ?></td>
                <td><?= $dt['no_identitas'] ?></td>
                <td><?= $dt['alamat'] ?></td>
                <td>
                  <div class="d-flex justify-content-center">
                    <a href="<?= url('edit_kurir','',$dt['id_kurir']) ?>" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></a>
                    <a data-toggle="modal" onclick="deleteData('<?= $dt['id_kurir'] ?>')" data-target="#deleteModal" class="btn btn-danger ml-3"><i class="fa fa-trash"> Delete</i></a>
                  </div> 
                </td>
              </tr>
              <?php } ?>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus data tersebut ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="btn_delete" class="btn btn-primary">Hapus Data </a>
      </div>
    </div>
  </div>
</div>
<script>
  function deleteData(id){
    document.getElementById("btn_delete").href= '_halaman/proses/delete_kurir.php?id='+id;
  }
</script>
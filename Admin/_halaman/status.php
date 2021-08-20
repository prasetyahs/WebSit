<?php
    $title="Data Status";
    $judul=$title;
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
                </tr>
                </thead>
                <tbody>
                <?php 
                include '../database/koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from tbl_resi");
                while($d = mysqli_fetch_array($data)){
			          ?>
                <tr>
                <td><?php echo $no++; ?></td>
                  <td><?php echo $d['id_resi'];?></td>
                  <td><?php echo $d['Tglambil'];?></td>
                  <td><?php echo $d['Tglkirim'];?></td>
                  <td><a href="<?=url('barang')?>"><?php echo $d['id_barang'];?></td>
                  <td><a href="<?=url('pengirim')?>"><?php echo $d['id_pengirim'];?></td>
                  <td><?php echo $d['status'];?></td>
                  
                  
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
          
            <a type="submit" class="btn btn-success float-right" href="<?=url('I_resi')?>">+ TAMBAH DATA</a>
         
          
        </div>
      </div>
          <!-- /.card -->
          </div>
      <!-- /.row -->
    </section>
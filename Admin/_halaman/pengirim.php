<?php
    $title="Data Pengirim";
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
                  <th>ID Pengirim</th>
                  <th>Nama Pengirim</th>
                  <th>Alamat</th>
                  <th>No Telphone</th>
                 
                
                </tr>
                </thead>
                <tbody>
                <?php 
                include '../database/koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from tbl_pengirim");
                while($d = mysqli_fetch_array($data)){
			          ?>
                <tr>
                <td><?php echo $no++; ?></td>
                  
                  <td><?php echo $d['id_pengirim']; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['alamat']; ?></td>
                  <td><?php echo $d['no_tlp']; ?></td>
                  
                 
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
          
            <a type="submit" class="btn btn-success float-right" href="<?=url('I_pengirim')?>">+ TAMBAH DATA</a>
         
          
        </div>
      </div>
          <!-- /.card -->
          </div>
      <!-- /.row -->
    </section>

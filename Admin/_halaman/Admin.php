<?php
    $title="Data User";
    $judul=$title;
  ?>

<section class="content">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA USER</h3>

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
                  <th>Name</th>
                  <th>Alamat)</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Kategori</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                include '../database/koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from admin");
                while($d = mysqli_fetch_array($data)){
			          ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['firstname']; ?> <?php echo $d['lastname']; ?></td>
                  <td><?php echo $d['alamat']; ?></td>
                  <td> <?php echo $d['email']; ?></td>
                  <td><?php echo $d['phone']; ?></td>
                  <td><?php echo $d['level']; ?></td>
                </tr>
                <?php 
                  }
                  ?>
                </tfoot>
              </table>
              
            </div>
           
            <!-- /.card-body -->
          </div>
   
          <!-- /.card -->
          </div>
      <!-- /.row -->
    </section>
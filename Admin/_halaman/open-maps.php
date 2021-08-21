<!-- Cek Resi -->
<div class="container">
  <div class="row mb-5 justify-content-center">
    <div class="col-md-7 text-center">
      <div class="block-heading-1">
        <h2>Tracking Order</h2>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row align-items-center">
    <div class="col-lg-12">
      <h1>Choose Your Quality Delivery of Your Cargo</h1>
      <p class="mb-5"></p>


      <form action="" method="post">
        <div class="form-group d-flex">
          <input type="text" class="form-control form-control-lg col-6 mb-2 " id="searchquery" name="keyword" placeholder="Enter your tracking number">
          <br>
          <input type="submit" class="btn btn-primary text-white px-4 mb-2" id="searchbutton" value="Search" name="Search" class="formbutton">
        </div>
      </form>
      <?php
      //koneksi
      include "./database/koneksi.php";
      if (isset($_POST['Search'])) {
        //variable
        $keyword = $_POST['keyword'];
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_resi
     INNER JOIN tbl_barang ON tbl_resi.id_barang =tbl_barang.id_barang
     INNER JOIN tbl_kurir ON tbl_resi.id_pengirim =tbl_kurir.id_kurir
     WHERE id_resi
     LIKE '%$keyword%' OR penerima LIKE '%$keyword%'
      ");
   
      
        $row = mysqli_num_rows($query);
        //cek apakah ada satu  
        if ($row == 0) {
      ?>
          <center>
            <h3>
              <font>404 NOT FOUND</font>
            </h3>
          </center>
        <?php
        } else {
        ?>
          <center>
            <h3>
              <font color="rgb(253, 215, 3)"> menampilkan <?php echo $row; ?> data.</font>
            </h3>
          </center>
          <?php

          ?>
         

            <?php

            }
            ?>
          </table>
      <?php
        }
      
      ?>

    </div>
  </div>
</div>
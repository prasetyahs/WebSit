


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
                <input type="text" class="form-control form-control-lg col-6 mb-2 "  id="searchquery" name="keyword" placeholder="Enter your tracking number" >
                <br>
                <input type="submit" class="btn btn-primary text-white px-4 mb-2"  id="searchbutton" value="Search" name="Search" class="formbutton">
              </div>
              </form>
              <?php
//koneksi
$koneksi = new mysqli('localhost','root','','skripsi');
if (isset($_POST['Search'])){
    //variable
     $keyword = $_POST['keyword'];
     $query = $koneksi->query("SELECT * FROM tbl_resi
     INNER JOIN tbl_barang ON tbl_resi.id_barang =tbl_barang.id_barang
     INNER JOIN tbl_pengirim ON tbl_resi.id_pengirim =tbl_pengirim.id_pengirim
     WHERE id_resi
     LIKE '%$keyword%' OR penerima LIKE '%$keyword%'
      ");
    
   





    $row = mysqli_num_rows($query);
    //cek apakah ada satu  
    if ($row==0){
        ?>
        <center><h3><font>404 NOT FOUND</font> </h3></center>
        <?php  
    }
    else{
        ?>
        <center><h3><font color="rgb(253, 215, 3)"> menampilkan <?php echo $row;?> data.</font></h3></center>
        <?php
       
        ?>
        <table class="table table-striped table-bordered table-hover" border="2" cellspacing="0">
        <tr class="nol">
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
                  <th>detail</th>
                  
        </tr>
       
        <?php
        foreach ($query as $rows){
        @$no++;
        $noresi               = $rows['id_resi'];
        $Pengirim             = $rows['nama'];
        $alamatPeng           = $rows['alamat'];
        $nopeng               = $rows['no_tlp'];
        $Penerima             = $rows['penerima'];
        $alamatPen            = $rows['alamat_penerima'];
        $nopen                = $rows['nohp'];
        $barang               = $rows['nama_barang'];
        $berat                = $rows['berat'];
        $qty                  = $rows['qty'];
        $tgl                  = $rows['Tglambil'];
        $status               = $rows['status'];
             
        
        ?>
        
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $no;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $noresi;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $Pengirim;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $alamatPeng;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $nopeng;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $Penerima;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $alamatPen;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $nopen;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $barang;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $berat;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $qty;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $tgl;?></td>
        <td class="main2"><font color="rgb(253, 215, 3)"><?php echo $status;?></td>
        <td class="main2"><a href="detail-data.php?id_karyawan=<?=$noresi['id_resi']?>">Detail</a></td>
        
        </tr>
        
        <?php
        
        }
        ?>
        </table>
        <?php
    }
}
?>
 
          </div>
        </div>
      </div>






       
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
          <table class="table table-striped table-bordered table-hover" border="2" cellspacing="0">
            <tr class="nol">
              <th>No</th>
              <th>No Resi</th>
              <th>Pengrim</th>
              <th>Alamat Pengrim</th>

              <th>Penerima</th>
              <th>Alamat Penerima</th>
              <th>No Telphone</th>
              <th>Nama Barang</th>
              <th>Berat</th>
              <th>Qty</th>
              <th>Tanggal pengiriman</th>
              <th>status</th>

            </tr>

            <?php
            foreach ($query as $rows) {
              @$no++;
              $noresi               = $rows['id_resi'];
              $Pengirim             = $rows['nama'];
              $alamatPeng           = $rows['alamat'];

              $Penerima             = $rows['penerima'];
              $alamatPen            = $rows['alamat_penerima'];
              $nopen                = $rows['nohp'];
              $barang               = $rows['nama_barang'];
              $berat                = $rows['berat'];
              $qty                  = $rows['qty'];
              $tgl                  = $rows['Tglambil'];
              $status               = $rows['status'];


            ?>

              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $no; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $noresi; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $Pengirim; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $alamatPeng; ?>
              </td>

              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $Penerima; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $alamatPen; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $nopen; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $barang; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $berat; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $qty; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $tgl; ?>
              </td>
              <td class="main2">
                <font color="rgb(253, 215, 3)"><?php echo $status; ?>
              </td>

              </tr>

            <?php

            }
            ?>
          </table>
          <div id="map" style="height: 400px;"></div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="assets/js/leaflet-routing-machine/examples/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/bundle.min.js"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/search.umd.js"></script>
<script>
  const map = L.map('map').setView([-6.2292727350343196, 106.92440978212976], 13);
  L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
  var LayerKita = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
  });

  map.addLayer(LayerKita);
  var myIcon = L.icon({
    iconUrl: '../WebSit/assets/building.png',
    iconSize: [38, 38],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76],
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
  });
  var myIcon2 = L.icon({
    iconUrl: '../WebSit/assets/customer.png',
    iconSize: [38, 38],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76],
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
  });
  L.marker([-6.2292727350343196, 106.92440978212976], {
    icon: myIcon
  }).addTo(map);
  L.marker([-6.22634555, 106.88842826999377],{icon:myIcon2}).addTo(map);

  // const search = new GeoSearch.GeoSearchControl({
  //   provider: new GeoSearch.OpenStreetMapProvider(),
  //   updateMap: true,
  //   style: 'bar',
  //   popupFormat: function(result) {
  //     let lat = result.result.x;
  //     let long = result.result.y;
  //     document.getElementById('lat').value = lat;
  //     document.getElementById('long').value = long;
  //   }
  // });
  // map.addControl(search);
</script>
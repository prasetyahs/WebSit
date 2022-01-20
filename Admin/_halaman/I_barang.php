<?php
// session_start();
$title = "Data Barang";
$judul = $title;
?>
<?php
// https://www.malasngoding.com
// menghubungkan dengan koneksi database

include('../database/koneksi.php');

// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(id_barang) as kodeTerbesar FROM tbl_barang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 5);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "BWH";
$kodeBarang = $huruf . sprintf("%05s", $urutan);
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= url('proses/sbarang') ?>" method="post" class="needs-validation">
            <div class="card-body">
              <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['type'] ?>">
                  <?= $_SESSION['message'] ?>
                </div>
                <?php unset($_SESSION['type']); ?>
                <?php unset($_SESSION['message']); ?>
              <?php } ?>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>ID Barang</label>
                    <input type="text" class="form-control" name="kodbar" style="width: 100%;" value="<?php echo $kodeBarang ?>" readonly>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="namabarang" style="width: 100%;">
                  </div>
                  <div class="form-group">
                    <label>Jenis Barang</label>
                    <input type="text" class="form-control" name="jenisbarang" style="width: 100%;" placeholder="Enter text">
                  </div>
                  <div class="form-group">
                    <label>Berat</label>
                    <input type="text" class="form-control" name="berat" style="width: 100%;">
                  </div>
                  <div class="form-group">
                    <label>Qty</label>
                    <input type="integer" class="form-control" name="qty" style="width: 100%;">
                  </div>
                  <div class="form-group ">
                    <label>Jenis Packing</label>
                    <select class="form-control" name="jenispacking">
                      <option value="">--Pilih--</option>
                      <option value="Palet">Palet</option>
                      <option value="Box">Box</option>
                      <option value="Plastik">Plastik</option>

                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>

                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tujuan</label>
                    <input id="city" type="text" class="form-control" name="tujuan" style="width: 100%;" required>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Penerima</label>
                    <input type="text" class="form-control" name="penerima" style="width: 100%;">
                  </div>
                  <div class="form-group">
                    <label>Alamat Penerima</label>
                    <input type="text" id="addr" class="form-control" name="alamat" style="width: 100%;" required>
                  </div>
                  <div class="form-group">
                    <label>No hanphone</label>
                    <input type="integer" class="form-control" name="nohp" style="width: 100%;">
                  </div>






                  <!-- /.form-group -->
                </div>
                <!-- /.col -->

              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label>Titik Lokasi</label>
                    <div id="map" style="height: 300px;"></div>
                  </div>
                </div>
              </div>
              <input type="hidden" name="lat" id="lat">
              <input type="hidden" name="long" id="long">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <a href="<?= url('barang') ?>" class="btn btn-secondary ">Cancel</a>
                  <input type="submit" value="Simpan" class="btn btn-success float-right ml-3">
                </div>
              </div>
              <!-- /.row -->
</section>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="assets/js/leaflet-routing-machine/examples/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/bundle.min.js"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/search.umd.js"></script>
<script>
  const map = L.map('map').setView([-6.2292727350343196, 106.92440978212976], 17);
  L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
  var LayerKita = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
  });

  map.addLayer(LayerKita);
  var marker;
  map.on('click', function(e) {
    if (marker)
      map.removeLayer(marker);
    latlon = e.latlng;
    $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + latlon['lat'] + "&lon=" + latlon['lng'], function(data) {
      if(!data.address.road){
        $("#addr").val("")
        $("#city").val('')
        alert("Titik Lokasi tidak valid");
      }else{
        resultAddr = data.address.road + " " + data.address.amenity + "," + data.address.city_block + "," + data.address.village + "," + data.address.suburb + "," + data.address.city_district + "," + data.address.city_district + "," + data.address.city + "," + data.address.country + "," + data.address.postcode;
        $("#addr").val(resultAddr)
        $("#city").val(data.address.city)
        document.getElementById('lat').value = latlon['lat'] ;
        document.getElementById('long').value = latlon['lng'];
      }
    });
    marker = L.marker(e.latlng).addTo(map);
  });

  const provider = new window.GeoSearch.OpenStreetMapProvider();
    const search = new GeoSearch.GeoSearchControl({
      provider: provider,
      style: 'bar',
      updateMap: true,
      autoClose: true,

    });
  // const search = new GeoSearch.GeoSearchControl({
  //   provider: new GeoSearch.OpenStreetMapProvider(),
  //   updateMap: true,
  //   style: 'bar',
  //   popupFormat: function(result) {
  //     let lat = result.result.x;
  //     let long = result.result.y;
  //     $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + lat + "&lon=" + long, function(data) {
  //       console.log(data);
  //     });
  //     // resultAddr = data.address.road + " " + data.address.amenity + "," + data.address.city_block + "," + data.address.village + "," + data.address.suburb + "," + data.address.city_district + "," + data.address.city_district + "," + data.address.city + "," + data.address.country + "," + data.address.postcode;
  //     document.getElementById('lat').value = lat;
  //     document.getElementById('long').value = long;
  //   }
  // });
  map.addControl(search);
</script>
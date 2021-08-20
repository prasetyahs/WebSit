  <?php
    $title="Beranda";
    $judul=$title;
  ?>
 <?=content_open()?>
       
        <?php 
	// session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
	<h1>SELAMAT DATANG DI BERANDA</h1>
 
	<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	
 
	<br/>
	<br/> 
<?=content_close()?>

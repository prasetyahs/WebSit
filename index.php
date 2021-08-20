<?php
include 'loader.php';
$setTemplate = true;
if (isset($_GET['halaman'])) {
  $halaman = $_GET['halaman'];
} else {
  $halaman = 'Awal';
}
ob_start();
$file = '_halaman1/' . $halaman . '.php';
if (!file_exists($file)) {
  include '_halaman1/error.php';
} else {
  include $file;
}
$content = ob_get_contents();
ob_end_clean();

if ($setTemplate == true);

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/head.php' ?>

<body>
  <?php
  include 'layouts/header.php';
  ?>

  <?php
  echo $content;
  ?>

  <?php
  include 'layouts/footer.php';
  include 'layouts/java.php';
  ?>
  </div>
</body>

</html>
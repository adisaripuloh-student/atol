<?php
   include ('session.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN ATOL TRAVEL</title>
    <link rel="shortcut icon" type="image/png" href="/images/ico/32.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>

  <body>
    <?php
      include '../navbar.php';
    ?>
    <div class="container content">
      <div class="row">
        <?php include ('halaman/daftar_pesanan.php'); ?>
      </div>
    </div>
    <hr class="devider">
    <?php include '../footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
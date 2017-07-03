<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>ATOL TRAVEL</title>
    <link rel="shortcut icon" type="image/png" href="/images/ico/32.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>

  <body>
  	<?php
      include 'navbar.php';
    ?>
  	<div class="container content">
  		<div class="row">
        <div class="col-md-12">
          <div class="col-md-6 col-xs-12">
            <?php include 'pesan.php'; ?>
          </div>
          <div class="col-md-6 col-xs-12">
            Info Promo
          </div>
        </div>
  		</div>
  	</div>
    <hr class="devider">
  	<?php include 'footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
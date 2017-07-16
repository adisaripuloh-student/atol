<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>ATOL TRAVEL</title>
    <link rel="shortcut icon" type="image/png" href="/images/ico/32.png"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>

  <body>
  	<?php
      include 'navbar.php';
    ?>
  	<div class="container content">
  		<div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="thumbnail">
              <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=-6.886548, 107.615338&hl=id;z=14&output=embed"></iframe>
              <div class="caption">
                <h3>ATOL TRAVEL BANDUNG</h3>
                <p><i class="glyphicon glyphicon-map-marker"></i> Jalan Dipatiukur, Coblong, Lebakgede, Bandung, Kota Bandung, Jawa Barat 40132</p>
                <p><i class="glyphicon glyphicon-earphone"></i> (0231) 1234567</p>
              </div>
            </div>
          </div>
        </div> <!-- End Kontak-->
        <div class="col-md-6">
          <div class="row">
            <div class="thumbnail">
              <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=-7.227746, 107.908667&hl=id;z=14&output=embed"></iframe>
              <div class="caption">
                <h3>ATOL TRAVEL JATINANGOR</h3>
                <p><i class="glyphicon glyphicon-map-marker"></i> UNPAD Jatinangor, Kota Kulon, Garut Kota, Kabupaten Garut, Jawa Barat 44112.</p>
                <p><i class="glyphicon glyphicon-earphone"></i> (022) 1234568</p>
              </div>
            </div>
          </div>
        </div> <!-- End Kontak-->
  		</div>
  	</div>
    <br>
    <br>
  	<?php include 'footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
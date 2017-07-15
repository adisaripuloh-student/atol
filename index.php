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
        <div class="bg"></div>
        <div class="jumbotron">
          <h1>ATOL TRAVEL</h1>
          <p class="lead">Kenyamanan Anda merupakan kepuasan bagi kami.</p>
        </div>
          <?php
            if(isset($_GET['msg'])) {
              echo '
                <div class="alert alert-success alert-dismissible col-md-10 col-md-offset-1 text-center" role="alert">
                    Silahkan cek email untuk melakukan pembayaran.<br><small>*cek folder spam jika tidak menemukan email di kotak masuk.
                </div>
              ';
            }
          ?>
          <div class="col-md-6 col-xs-12">
            <?php include 'pesan.php'; ?>
          </div>
          <div class="col-md-6 col-xs-12">
            <?php include 'tentang.php'; ?>
          </div>
        </div>
  		</div>
  	</div>
    <hr class="devider">
  	<?php include 'footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/tambahan.js"></script>
    <script type="text/javascript">
      var jumboHeight = $('.jumbotron').outerHeight();
      function parallax(){
          var scrolled = $(window).scrollTop();
          $('.bg').css('height', (jumboHeight-scrolled) + 'px');
      }

      $(window).scroll(function(e){
          parallax();
      });
    </script>
  </body>
</html>
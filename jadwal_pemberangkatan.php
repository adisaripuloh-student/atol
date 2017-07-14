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
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="text-center">Jadwal Pemberangkatan</h2>
              <p class="text-center"><small>Setiap hari buka.</small></p>
            </div>
            <div class="panel-body">
              <div class="table-responsive" style="text-align: center;">
                <table class="table">
                  <tr>
                    <th style="text-align: center;">Bandung - Jatinangor</th>
                    <th style="text-align: center;">Jatinangor - Bandung</th>
                  </tr>
                  
                    <?php
                      $j = 6;
                      for ($i=0; $i<=12; $i++) {
                        if ($j <= 9) {
                          echo '<tr>';
                          echo '<td>0'.$j.'.00</td>';
                          echo '<td>0'.$j.'.00</td>';
                          echo '</tr>';
                        } else {
                          echo '<tr>';
                          echo '<td>'.$j.'.00</td>';
                          echo '<td>'.$j.'.00</td>';
                          echo '</tr>';
                        }
                        $j++;
                      }
                    ?>
                  </tr>
                </table>
              </div>
            </div>
            <div class="panel-footer">* Tarif Rp. 20.000</div>
          </div> <!-- End Panel-->
        </div> <!-- End Jadwal Pemberangkatan-->
  		</div>
  	</div>
    <hr class="devider">
  	<?php include 'footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
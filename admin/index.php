<?php
  session_start();

  if(isset($_SESSION['username']) != ""){
    header("location: /admin/dashboard.php");
  }
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
    <div class="container content-login">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <div class="panel panel-default">
            <div class="panel-heading">
              <center><h3 class="panel-title">Masuk</h3></center>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="POST" action="/admin/proses/login.php">
                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn-login" class="btn btn-primary">Masuk</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="devider">
    <?php include '../footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
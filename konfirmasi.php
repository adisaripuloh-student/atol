<?php
session_start();
if(isset($_GET['id'])) {
  require_once ('db.php');
  $id = $_GET['id'];
  $sql = "SELECT * FROM pesanan WHERE id='$id'";
  $result = mysqli_query($db,$sql);
  $row = $result->fetch_assoc();
}
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
      <div class="col-md-6 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center">Konfirmasi Sekarang</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" action="/admin/proses/konfirmasi.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="id_pesanan" class="col-sm-4 control-label">ID Pesanan</label>
                <div class="col-sm-8">
                  <?php if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                  ?>
                    <input type="text" class="form-control" name="id_pesanan" value="<?php echo $row['id'] ?>" readonly="readonly">
                  <?php } else { ?>
                    <input type="text" class="form-control" name="id_pesanan" placeholder="ID Pesanan">
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label for="no_kontak" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-8">
                  <?php if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                  ?>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama_pemesan'] ?>" readonly="readonly">
                  <?php } else { ?>
                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label for="no_kontak" class="col-sm-4 control-label">Kontak</label>
                <div class="col-sm-8">
                  <?php if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                  ?>
                    <input type="text" class="form-control" name="no_kontak" value="<?php echo $row['kontak'] ?>" readonly="readonly">
                  <?php } else { ?>
                    <input type="text" class="form-control" name="no_kontak" placeholder="0800 0000 0000">
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label for="bukti" class="col-sm-4 control-label">Bukti Transfer</label>
                <div class="col-sm-8">
                  <input type="file" class="form-control" name="bukti">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-md-offset-2">
                  <button type="submit" class="btn btn-primary pull-right" name="konfirmasi">Konfirmasi</button>
                </div>
              </div>
            </form>
          </div>
        </div>
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
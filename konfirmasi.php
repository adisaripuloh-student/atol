<?php
session_start();
if(isset($_GET['key']) AND !empty($_GET['key'])) {
  require_once ('db.php');
  $key = $_GET['key'];
  $sql = "SELECT * FROM pesanan WHERE key_konfirmasi='$key'";
  $result = mysqli_query($db,$sql);
  $row = $result->fetch_assoc();
  if($key != $row['key_konfirmasi']) {
    header('location: /');
  }
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
      <?php if(isset($key)) {
        $key = $_GET['key'];
      ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title text-center">Konfirmasi Pembayaran</h3>
          </div>
          <div class="panel-body">
            <!-- Pesan -->
            <?php
              $kode = $row['pembayaran'];
              if($kode != 2) {
                if($kode == 0) {
                  echo '
                    <div class="alert alert-warning alert-dismissible col-md-10 col-md-offset-1 text-center" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Anda belum melakukan konfirmasi pembayaran.<br>Silahkan konfirmasi pembayaran dengan meng-upload bukti pembayaran.
                    </div>
                  ';
                }
                if ($kode == 1) {
                  echo '
                    <div class="alert alert-warning alert-dismissible col-md-10 col-md-offset-1 text-center" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Menunggu konfirmasi dari Admin.<br>Jika 15 menit sebelum keberangkatan belum di konfirmasi silahkan hubungi kontak yang telah di sediakan.
                      <br><br><a href="/" class="text-center">Beranda</a>
                    </div>
                  ';
                }
                if (isset($_GET['msg']) == 'error') {
                  echo '
                    <div class="alert alert-danger alert-dismissible col-md-10 col-md-offset-1 text-center" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      File yang Anda masukkan salah.
                    </div>
                  ';
                }
            ?>
                <form class="form-horizontal" method="post" action="/admin/proses/konfirmasi.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="id_pesanan" class="col-sm-4 control-label">ID Pesanan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_pesanan" value="<?php echo $row['id'] ?>" readonly="readonly">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama_pemesan'] ?>" readonly="readonly">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_kontak" class="col-sm-4 control-label">E-mail</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="no_kontak" value="<?php echo $row['kontak'] ?>" readonly="readonly">
                    </div>
                  </div>
                  <?php if ($kode == 0) { ?>
                  <div class="form-group">
                    <label for="bukti" class="col-sm-4 control-label">Bukti Transfer</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="bukti" required="required">
                    </div>
                  </div>
                  <?php } ?>
                  <?php if ($kode == 0) { ?>
                  <div class="form-group">
                    <div class="col-sm-10 col-md-offset-2">
                      <button type="submit" class="btn btn-primary pull-right" name="konfirmasi">Konfirmasi</button>
                    </div>
                  </div>
                  <?php } 
                } else {
                  echo '
                    <div class="alert alert-success alert-dismissible col-md-10 col-md-offset-1 text-center" role="alert">
                      Pembayaran telah di konfirmasi.<br>Cek email Anda untuk cetak nota.
                      <br><br><a href="/" class="text-center">Beranda</a>
                    </div>
                  ';
                  }?>
            </form>
          </div>
        </div>
        <?php } else { header('location: /'); } ?>
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
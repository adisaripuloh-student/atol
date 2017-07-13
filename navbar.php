<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="row">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">ATOL TRAVEL</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="/jadwal_pemberangkatan.php">Jadwal Pemberangkatan</a></li>
          <?php if(isset($_SESSION['username']) != "admin"){ ?>
          <li><a href="/kontak.php">Hubungi Kami</a></li>
          <?php } ?>
        </ul>
        <?php if(isset($_SESSION['username']) != ""){ ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/dashboard.php">Dashboard</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/admin/proses/logout.php">Keluar</a></li>
              </ul>
            </li>
          </ul>
        <?php } else { ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin">Login Admin</a></li>
          </ul>
        <?php } ?>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</nav>
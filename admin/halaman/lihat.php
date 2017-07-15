<?php
  require_once ('../db.php');

  $sql = "SELECT * FROM pesanan WHERE key_konfirmasi='$key'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $jam_berangkat = $row['jam_berangkat'];
  $pembayaran = $row['pembayaran'];
  $foto_konfirmasi = $row['foto_konfirmasi'];
  $j = 6;
  for($i=1; $i<=13; $i++) {
    if(($jam_berangkat == $i)) {
      if($j <= 9) {
        $new_jadwal = '0' . $j . '.00';
      } else {
        $new_jadwal = $j . '.00';
      }
    }
    $j++;
  }

  if($pembayaran == 0) {
    $new_pembayaran = '
      <span class="label label-default">Belum di Konfirmasi</span>
      <div class="btn-group" role="group">
        <a href="proses/admin_konfirmasi.php?act=konfirmasi&key='.$key.'"><button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-ok"></i></button></a>
        <a href="proses/admin_konfirmasi.php?act=batal&key='.$key.'"><button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-remove"></i></i></button></a>
      </div>
    ';
  }

  if($pembayaran == 1) {
    $new_pembayaran = '
      <span class="label label-warning">Menunggu Konfirmasi</span>
      <div class="btn-group" role="group">
        <a href="proses/admin_konfirmasi.php?act=konfirmasi&key='.$key.'"><button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-ok"></i></button></a>
        <a href="proses/admin_konfirmasi.php?act=batal&key='.$key.'"><button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-remove"></i></i></button></a>
      </div>
    ';
  }

  if($pembayaran == 2) {
    $new_pembayaran = '
      <span class="label label-success">Pembayaran Selesai</span>
    ';
  }
?>
<div class="col-sm-8 col-sm-offset-2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title text-center">ID Pesanan #<?php echo $row['id']; ?></h2>
    </div>
    <div class="panel-body">
      <table class="table table-bordered">
        <tr>
          <td align="right"><b>Nama</b></td><td><?php echo $row['nama_pemesan']; ?></td>
        </tr>
        <tr>
          <td align="right"><b>Email</b></td><td><a href="mailto:<?php echo $row['kontak']; ?>"><?php echo $row['kontak']; ?></a></td>
        </tr>
        <tr>
          <td align="right"><b>Tanggal Berangkat</b></td><td><?php echo $row['tgl_berangkat']." ".$new_jadwal; ?></td>
        </tr>
        <tr>
          <td align="right"><b>No. Kursi</b></td><td><?php echo $row['no_kursi']; ?></td>
        </tr>
        <tr>
          <td align="right"><b>Pembayaran</b></td><td><?php echo $new_pembayaran; ?></td>
        </tr>
        <?php if($pembayaran != 0) { ?>
        <tr>
          <td align="right"><b>Foto Konfirmasi</b></td>
          <td class="text-center">
          <?php
            if($row['foto_konfirmasi'] == null) {
              echo 'Tidak ada foto konfirmasi.';
            } else {
              echo '
                <div class="thumbnail">
                  <img src="../images/konfirmasi/'.$foto_konfirmasi.'" width="400px" height="auto">
                  <div class="caption">
                  <p><a href="../images/konfirmasi/'.$foto_konfirmasi.'" target="_blank" class="btn btn-default">Perbesar</a></p>
                  </div>
                </div>
              ';
            }
          ?>
          </td>
        </tr>
        <?php } ?>
      </table>

      <div class="form-group">
        <div class="col-sm-12">
          <a href="dashboard.php"><button class="btn btn-primary pull-left">Dashboard</button></a>
          <a href="dashboard.php?act=edit&key=<?php echo $key; ?>"><button class="btn btn-primary pull-right">Edit</button>
        </div>
      </div>
    </div>
  </div>
</a>
</div>
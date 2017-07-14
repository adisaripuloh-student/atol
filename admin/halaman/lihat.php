<?php
  require_once ('../db.php');

  $sql = "SELECT * FROM pesanan WHERE key_konfirmasi='$key'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $jam_berangkat = $row['jam_berangkat'];
  $pembayaran = $row['pembayaran'];
  $foto_konfirmasi = $row['foto_konfirmasi'];
  $j = 6;
  for($i=1; $i<=12; $i++) {
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
    ';
  }

  if($pembayaran == 1) {
    $new_pembayaran = '
      <span class="label label-warning">Menunggu Konfirmasi</span>
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
    <h2 class="text-center">ID Pesanan #<?php echo $row['id']; ?></h2>
    <table class="table">
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
        <td align="right"><b>No. Kursi</b></td><td><?php echo $row['jam_berangkat']; ?></td>
      </tr>
      <tr>
        <td align="right"><b>Pembayaran</b></td><td><?php echo $new_pembayaran; ?></td>
      </tr>
      <?php if($pembayaran != 0) { ?>
      <tr>
        <td align="right"><b>Foto Konfirmasi</b></td>
        <td>
        <?php
          if($row['foto_konfirmasi'] == null) {
            echo 'Belum ada foto konfirmasi.';
          } else {
            echo '
              <img src="../images/konfirmasi/'.$foto_konfirmasi.'" width="150px" height="150px" class="img-thumbnail img-responsive">
            ';
          }
        ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <a href="dashboard.php"><button class="btn btn-primary pull-left">Dashboard</button></a>
  <a href="dashboard.php?act=edit&key=<?php echo $key; ?>"><button class="btn btn-primary pull-right">Edit</button></a>
</div>
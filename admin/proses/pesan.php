<?php
  if(isset($_POST['pesan'])) {
    require_once ('../../db.php');

    $dari = $_POST['dari'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $jam_berangkat = $_POST['jam_berangkat'];
    $kursi = $_POST['kursi'];
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];

    if($dari == 'Bandung') {
      $ke = 'Jatinangor';
    } else {
      $ke = 'Bandung';
    }

    $sql = "INSERT INTO pesanan (dari, ke, tgl_berangkat, jam_berangkat, no_kursi, nama_pemesan, kontak, pembayaran)
      VALUES('$dari', '$ke', '$tgl_berangkat', '$jam_berangkat', '$kursi', '$nama', '$kontak', 0)";
    $insert = mysqli_query($db, $sql);

    if ($insert) {
      header("location: /konfirmasi.php?id=".mysqli_insert_id($db));
    } else {
      echo "Error: ".mysqli_error($db);
    }
    mysqli_close($db);
  } else {
    header('location: /');
  }
?>
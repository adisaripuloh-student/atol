<?php
  session_start();

  require_once ('../../db.php');

  function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
  }

  if(is_ajax()) {
    $dari = $_POST['dari'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $jam_berangkat = $_POST['jam_berangkat'];
    $kursi = $_POST['kursi'];

    $sql = "SELECT * FROM pesanan WHERE dari='$dari' AND
            tgl_berangkat='$tgl_berangkat' AND
            jam_berangkat='$jam_berangkat' AND no_kursi='$kursi'";
    $query = mysqli_query($db, $sql);
    $count = mysqli_num_rows($query);

    header('Content-Type: application/json');
    echo json_encode(['result' => $count]);
    exit;
  }
?>
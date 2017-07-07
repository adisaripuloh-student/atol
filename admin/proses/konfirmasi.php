<?php
  if(isset($_POST['konfirmasi'])) {
    $id = $_POST['id_pesanan'];
    $kontak = $_POST['no_kontak'];

    $dir = '../../images/konfirmasi/';
    $file = $dir . basename($_FILES["bukti"]["name"]);

    $imageFileType = pathinfo($file,PATHINFO_EXTENSION);
  }
?>
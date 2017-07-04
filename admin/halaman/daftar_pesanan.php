<h3 class="text-center">Daftar Pesanan</h3>
<hr>
<table class="table table-striped text-center">
  <thead>
    <td>ID</td>
    <td>Nama Pemesan</td>
    <td>Dari</td>
    <td>Ke</td>
    <td>Keberangkatan</td>
    <td>No. Kursi</td>
    <td>Kontak</td>
    <td>Pembayaran</td>
    <td>Foto Konfirmasi</td>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM pesanan ORDER by id DESC ";
  $result = mysqli_query($db,$sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $id = $row['id'];
      $nama_pemesan = $row['nama_pemesan'];
      $dari = $row['dari'];
      $ke = $row['ke'];
      $tgl_berangkat = $row['tgl_berangkat'];
      $jam_berangkat = $row['jam_berangkat'];
      $no_kursi = $row['no_kursi'];
      $no_kursi = $row['no_kursi'];
      $kontak = $row['kontak'];
      $pembayaran = $row['pembayaran'];
      $pembayaran = $row['pembayaran'];
      $foto_konfirmasi = $row['foto_konfirmasi'];

      echo '
      <tr>
        <td>'.$id.'</td>
        <td>'.$nama_pemesan.'</td>
        <td>'.$dari.'</td>
        <td>'.$ke.'</td>
        <td>'.$tgl_berangkat.' '.($jam_berangkat).'</td>
        <td>'.$no_kursi.'</td>
        <td>'.$kontak.'</td>
        <td>'.$pembayaran.'</td>
        <td><a href="/images/foto_konfirmasi/'.$foto_konfirmasi.'">Lihat</a></td>
      </tr>
      ';
    }
  }
  $conn->close();
  ?>
  </tbody>
</table>
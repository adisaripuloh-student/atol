<h3 class="text-center">Daftar Pesanan</h3>
<hr>
<table class="table table-striped table-bordered text-center table-responsive" id="table">
  <thead>
    <td>ID</td>
    <td>Nama Pemesan</td>
    <td>Dari</td>
    <td>Ke</td>
    <td>Keberangkatan</td>
    <td>No. Kursi</td>
    <td>Kontak</td>
    <td>Pembayaran</td>
    <td>Konfirmasi</td>
    <td></td>
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

      echo '
      <tr>
        <td>'.$id.'</td>
        <td>'.$nama_pemesan.'</td>
        <td>'.$dari.'</td>
        <td>'.$ke.'</td>
        <td>'.$tgl_berangkat.' '.$new_jadwal.'</td>
        <td>'.$no_kursi.'</td>
        <td>'.$kontak.'</td>
        <td>'.$pembayaran.'</td>
        <td>'.$foto_konfirmasi.'</td>
        <td>
          <div class="btn-group" role="group">
            <a href="#"><button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-eye-open"></i></button></a>
            <a href="#"><button type="button" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-edit"></i></i></button></a>
          </div>
        </td>
      </tr>
      ';
    }
  }
  ?>
  </tbody>
</table>
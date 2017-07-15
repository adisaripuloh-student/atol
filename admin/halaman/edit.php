<?php
  require_once ('../db.php');

  $sql = "SELECT * FROM pesanan WHERE key_konfirmasi='$key'";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $dari = $row['dari'];
  $id = $row['id'];
  $tgl = $row['tgl_berangkat'];
  $jam = $row['jam_berangkat'];
  $kursi = $row['no_kursi'];
  $nama = $row['nama_pemesan'];
  $email = $row['kontak'];

  if($dari == 'Bandung') {
  	$tujuan = 'Bandung - Jatinangor';
  } else {
  	$tujuan = 'Jatinangor - Bandung';
  }
?>
<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title text-center">Ubah Pesanan #<?php echo $id; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="alert alert-success" id="tersedia" style="display: none;">
	  	TEs
	  	</div>
	    <form class="form-horizontal" id='form-edit-pesanan' method="post" action="/admin/proses/edit.php">
	      <div id="pesan">
	        <div class="form-group">
	          <label for="nama" class="col-sm-4 control-label">Nama</label>
	          <div class="col-sm-8">
	            <input type="text" class="form-control" name="nama" readonly="readonly" value="<?php echo $nama; ?>">
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="kontak" class="col-sm-4 control-label">Email</label>
	          <div class="col-sm-8">
	            <input type="email" class="form-control" name="kontak" readonly="readonly" value="<?php echo $email; ?>">
	          </div>
	        </div>
	      </div>
	      <div id="jadwal">
	        <div class="form-group">
	          <label for="tujuan" class="col-sm-4 control-label">Tujuan</label>
	          <div class="col-sm-8">
	            <input type="text" class="form-control" name="tujuan" id="tujuan" value="<?php echo $tujuan; ?>" readonly="readonly">
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="tgl_berangkat" class="col-sm-4 control-label">Tanggal Berangkat</label>
	          <div class="col-sm-8">
	            <input type="Date" class="form-control" name="tgl_berangkat" id="tgl_berangkat" value="<?php echo $tgl; ?>">
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="jam_berangkat" class="col-sm-4 control-label">Jam Berangkat</label>
	          <div class="col-sm-8">
	            <select class="form-control" name="jam_berangkat" id="jam_berangkat">
	              <?php
	              $j = 6;
	              for ($i=1; $i<=13; $i++) {
	                if ($j <= 9) {
	                	if($i == $jam) {
		                  echo '<option selected="selected" value="'.$x.'">0'.$j.'.00</option>';
		                } else {
		                	echo '<option value="'.$x.'">0'.$j.'.00</option>';
		                }
	                } else {
	                	if($i == $jam) {
		                  echo '<option selected="selected" value="'.$x.'">'.$j.'.00</option>';
		                } else {
		                	echo '<option value="'.$x.'">'.$j.'.00</option>';
		                }
	                }
	                $j++;
	              }
	              ?>
	            </select>
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="kursi" class="col-sm-4 control-label">Posisi Kursi</label>
	          <div class="col-sm-8">
	            <select class="form-control" name="kursi" id="kursi">
	              <?php
	              for ($i=1; $i<=13; $i++) {
	              	if($i == $kursi) {
	              		echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
	              	} else {
		                echo '<option value="'.$i.'">'.$i.'</option>';
		              }
	              }
	              ?>
	            </select>
	          </div>
	        </div>
	        <div class="form-group">
	          <div class="col-sm-8 col-md-offset-4">
	            <a href="dashboard.php"><button type="button" class="btn btn-primary pull-left">Dashboard</button></a>
	            <button type="button" class="btn btn-primary pull-right" name="pesan" id="btn_simpan">Simpan</button>
	          </div>
	        </div>
	      </div>
	    </form>
	  </div>
	</div>
</div>
<center><h2>Pesan Sekarang</h2></center>
<br>
<form class="form-horizontal">
  <div class="form-group">
    <label for="dari" class="col-sm-2 control-label">Dari</label>
    <div class="col-sm-10">
      <select class="form-control" name="dari">
        <option value="Bandung">Bandung</option>
        <option value="Jatinangor">Jatinangor</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="ke" class="col-sm-2 control-label">Ke</label>
    <div class="col-sm-10">
      <select class="form-control" name="ke">
        <option value="Bandung">Bandung</option>
        <option value="Jatinangor">Jatinangor</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="tgl_berangkat" class="col-sm-4 control-label">Tanggal Berangkat</label>
    <div class="col-sm-8">
      <input type="Date" class="form-control" name="tgl_berangkat">
    </div>
  </div>
  <div class="form-group">
    <label for="jam_berangkat" class="col-sm-4 control-label">Jam Berangkat</label>
    <div class="col-sm-8">
      <select class="form-control" name="jam_berangkat">
        <?php
        $j = 6;
        for ($i=0; $i<=12; $i++) {
          if ($j <= 9) {
            echo '<option value="0'.$i.'">0'.$j.'.00</option>';
          } else {
            echo '<option value="'.$i.'">'.$j.'.00</option>';
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
      <select class="form-control" name="kursi">
        <?php
        for ($i=1; $i<=13; $i++) {
          echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-primary">Pesan</button>
    </div>
  </div>
</form>
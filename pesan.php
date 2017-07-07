<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Pesan Sekarang</h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" method="post" action="/admin/proses/pesan.php">
      <div id="jadwal">
        <div class="form-group">
          <label for="dari" class="col-sm-4 control-label">Dari</label>
          <div class="col-sm-8">
            <select class="form-control" name="dari" id="dari">
              <option value="Bandung">Bandung</option>
              <option value="Jatinangor">Jatinangor</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="tgl_berangkat" class="col-sm-4 control-label">Tanggal Berangkat</label>
          <div class="col-sm-8">
            <input type="Date" class="form-control" name="tgl_berangkat" id="tgl_berangkat">
          </div>
        </div>
        <div class="form-group">
          <label for="jam_berangkat" class="col-sm-4 control-label">Jam Berangkat</label>
          <div class="col-sm-8">
            <select class="form-control" name="jam_berangkat" id="jam_berangkat">
              <?php
              $j = 6;
              for ($i=0; $i<=12; $i++) {
                $x = $i + 1;
                if ($j <= 9) {
                  echo '<option value="'.$x.'">0'.$j.'.00</option>';
                } else {
                  echo '<option value="'.$x.'">'.$j.'.00</option>';
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
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-8">
            <span>* Tarif Rp. 20.000</span>
            <button type="button" class="btn btn-primary pull-right" id="btn_next">Cek Ketersediaan</button>
          </div>
        </div>
      </div>
      <div id="pesan" style="display: none">
        <div class="form-group">
          <label for="nama" class="col-sm-4 control-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="nama" placeholder="Nama">
          </div>
        </div>
        <div class="form-group">
          <label for="kontak" class="col-sm-4 control-label">Kontak</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="kontak" placeholder="0800 0000 0000">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8 col-md-offset-4">
            <button type="button" class="btn btn-primary pull-left" onclick="batal()">Batal</button>
            <button type="submit" class="btn btn-primary pull-right" name="pesan">Pesan & Bayar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
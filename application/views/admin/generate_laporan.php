<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	
	<h1 class="h3 mb-8 text-gray-800"><?= $title; ?></h1>
    <label>Cetak Berdasarkan</label><br>
	<!-- Button trigger modal -->
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalBulan">
  Per Bulan
</button>

<!-- Modal -->
<div class="modal fade" id="modalBulan" tabindex="-1" aria-labelledby="modalBulanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBulanLabel">Pilih Bulan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="get" action="">
            <label>Filter Berdasarkan</label><br>
            <select name="filter" id="filter">
                <!-- <option value="">Pilih</option> -->
                <option value="2">Per Bulan</option>
                <!-- <option value="3">Per Tahun</option> -->
            </select>
            <div id="form-bulan">
                <label>Bulan</label><br>
                <select name="bulan">
                    <option value="">Pilih</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div id="form-tahun">
                <label>Tahun</label><br>
                <select name="tahun">
                    <option value="">Pilih</option>
                    <?php
                    foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                        echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                    }
                    ?>
                </select>
                <br /><br />
            </div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="download" id="download" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Download</button><br>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalTahun">
  Per Tahun
</button>
<br>
<!-- Modal -->
<div class="modal fade" id="modalTahun" tabindex="-1" aria-labelledby="modalTahunLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTahunLabel">Pilih Tahun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="get" action="">
            <label>Filter Berdasarkan</label><br>
            <select name="filter" id="filter">
                <!-- <option value="">Pilih</option> -->
                <!-- <option value="2">Per Bulan</option> -->
                <option value="3">Per Tahun</option>
            </select>
            
            <div id="form-tahun">
                <label>Tahun</label><br>
                <select name="tahun">
                    <option value="">Pilih</option>
                    <?php
                    foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                        echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                    }
                    ?>
                </select>
                <br /><br />
            </div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="download" id="download" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Download</button><br>
        </form>
      </div>
    </div>
  </div>
</div>

		
	<!-- <form method="get" action="">
        <label>Cetak Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />

        </div>
		
        <button type="submit" name="download" id="download" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Download</button>
		 <button type="submit" name="cek" id="cek" href="<?= base_url('Admin/CetakController'); ?>">cek</button> 
    </form> -->
	</div>
        <!-- /.container-fluid -->
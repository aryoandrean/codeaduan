        <!-- Begin Page Content -->
        <div class="container-fluid ">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="<?= base_url('Admin/LaporanController') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Petugas</div>
                      <div class="h5 mb-3 font-weight-bold text-gray-800"><?= number_format($petugas) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                  <a href="<?= base_url('Admin/PetugasController'); ?>" class="card-link text-xs font-weight-bold text-primary text-uppercase mt-5">Lihat</a>
                </div>
              </div>
            </div>

        
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Semua Pengaduan</div>
                      <div class="h5 mb-3 font-weight-bold text-gray-800"><?= number_format($pengaduan) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                  <a href="<?= base_url('Admin/TanggapanController'); ?>" class="card-link text-xs font-weight-bold text-primary text-uppercase mt-5">Lihat</a>
                </div>
              </div>
            </div>

          
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengaduan diproses</div>
                      <div class="h5 mb-3 font-weight-bold text-gray-800"><?= number_format($pengaduan_proses) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                  <a href="<?= base_url('Admin/TanggapanController/tanggapan_proses'); ?>" class="card-link text-xs font-weight-bold text-primary text-uppercase mt-5">Lihat</a>
                </div>
              </div>
            </div>

           <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengaduan Selesai dikerjakan</div>
                      <div class="h5 mb-3 font-weight-bold text-gray-800"><?= number_format($pengaduan_selesai) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                  <a href="<?= base_url('Admin/TanggapanController/tanggapan_selesai'); ?>" class="card-link text-xs font-weight-bold text-primary text-uppercase mt-5">Lihat</a>
                </div>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title1; ?></h1>
  <label>Filter Berdasarkan</label><br>
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
        <button type="submit" name="tampilkan" id="tampilkan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tampilkan</button><br>
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
        <button type="submit" name="tampilkan" id="tampilkan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tampilkan</button><br>
        </form>
      </div>
    </div>
  </div>
</div>

	<!-- <h1 class="h3 mb-4 text-gray-800"><?= $title1; ?></h1>
  <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            
            <option value="2">Per Bulan</option>
            <option value="3" type="submit">Per Tahun</option>
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
        <button type="submit" name="tampilkan" id="tampilkan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tampilkan</button><br>
    
    </form> -->
    <br />
	<?php if ($pengaduan) : ?>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">Nik</th>
					<th scope="col">Laporan</th>
					<th scope="col">Tgl P</th>
					<th scope="col">Status</th>
					<th scope="col">Tanggapan</th>
					<th scope="col">Tgl T</th>
				</tr>
			</thead>
			<tbody>
	
				<?php $no = 1; ?>
				<?php foreach($pengaduan_all as $l) : ?>
					<tr>
						<th scope="row"><?= $no++; ?></th>
						<td><?= $l->nama ?></td>
						<td><?= $l->nik ?></td>
						<td><?= $l->isi_laporan ?></td>
						<td><?= $l->tgl_pengaduan ?></td>
						<td>
							<?php 
							if ($l->status == '0') :
								echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
							elseif ($l->status == 'proses') :
								echo '<span class="badge badge-primary">Sedang di proses</span>';
							elseif ($l->status == 'selesai') :
								echo '<span class="badge badge-success">Selesai di kerjakan</span>';
							elseif ($l->status == 'tolak') :
								echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
							else :
								echo '-';
							endif;
							?>
						</td>
						<td><?= $l->tanggapan == null ? '-' : $l->tanggapan; ?></td>
						<td><?= $l->tgl_tanggapan == null ? '-' : $l->tgl_tanggapan; ?></td>
					</tr>
				<?php endforeach; ?>
				
			</tbody>
			
		</table>
		<br>
    <br>
    <br>
		

		<?php else : ?>
			<p class="text-center">Belum ada data</p>
		<?php endif; ?>

		
	
	</div>
        <!-- /.container-fluid -->
        </div>
      <!-- End of Main Content -->
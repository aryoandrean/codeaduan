        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaduan yang telah dibuat</h1>
          </div>

          <!-- Content Row -->
          
            <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Laporan</th>
                  <th scope="col">Tgl Melapor</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
              <?php if ( ! empty($data_pengaduan)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($data_pengaduan as $dp) : ?>
                  <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $dp['isi_laporan']; ?></td>
                    <td><?= $dp['tgl_pengaduan']; ?></td>
                    <td>
                      <img width="100" src="<?= base_url() ?>assets/uploads/<?= $dp['foto']; ?>" alt="">
                    </td>
                    <td>
                    <?php 
                      if ($dp['status'] == '0') :
                        echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
                      elseif ($dp['status'] == 'proses') :
                        echo '<span class="badge badge-primary">Sedang di proses</span>';
                      elseif ($dp['status'] == 'selesai') :
                        echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                      elseif ($dp['status'] == 'tolak') :
                        echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
                      else :
                        echo '-';
                      endif;
                      ?>
                    </td>
                    
                    </tr>
                  <?php endforeach; ?>
                <?php else : ?>
                  <div class="text-center">Belum Ada Pengaduan</div>
                <?php endif; ?>
                </tbody>
              </table>
              <br>
    <br>
    <br>
              </div>
          </div>
          <!-- /.container-fluid -->
      
          
        </div>
      <!-- End of Main Content -->
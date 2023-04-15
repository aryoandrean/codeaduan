<div class="container-fluid">
  <h1 class="h3 mb-4 mt-5 text-gray-800">Data User</h1>
  <?= form_open('Admin/UserController'); ?>
  <?php if ( ! empty($data_user)) : ?>
  <div class="table-responsive">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">NIK</th>
        <th scope="col">Nama</th>
        <th scope="col">Telp</th>
        <th scope="col">Aksi</th>
      </tr>
      
    </thead>

    <tbody>

      <?php $no = 1; ?>
      <?php foreach ($data_user as $du) : ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td><?= $du['nik']; ?></td>
          <td><?= $du['nama']; ?></td>
          <td><?= $du['telp']; ?></td>
          <td>
              <a href="<?= base_url('Admin/UserController/user_detail/'.$du['nik']) ?>" class="btn btn-info">Detail</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br>
      <br>
      <br>
  </div>
  <?php else : ?>
        <div class="text-center">Belum Ada User Baru</div>
      <?php endif; ?>
<!-- /.container-fluid -->
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="<?= base_url('Admin/UserController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <div class="row">
    <div class="col-lg-6">

     <?= form_open('Admin/UserController/user_detail/'.$masyarakat['nik']); ?>

     <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= $masyarakat['nama'] ?>">
    </div>


    <div class="form-group">
      <label for="telp">Telp</label>
      <input type="text" class="form-control" id="telp" placeholder="" name="telp" value="<?= $masyarakat['telp'] ?>">
    </div>

    <label for="">Verifikasi</label>
    <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="verified" id="Verified" value="Verified" <?= $masyarakat['verified'] == 'Verified' ? 'checked' : ''; ?>>
        <label class="form-check-label" for="Verified">Verifikasi</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="verified" id="0" value="0" <?= $masyarakat['verified'] == '0' ? 'checked' : ''; ?>>
        <label class="form-check-label" for="0">Tolak</label>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <br>
    <br>
    <br>
    <?= form_close(); ?>
  </div>
</div>

<!-- /.container-fluid -->
</div>
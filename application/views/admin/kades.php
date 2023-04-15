<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <!-- <div class="row">
    <div class="col-lg-6">

     <?= form_open('Admin/KadesController'); ?>

     <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= set_value('nama') ?>">
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
    <?= form_close(); ?>
  </div>
</div> -->

<!-- Page Heading -->

<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nama Kades</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($data_kades as $dp) : ?>
      <tr>
        <td><?= $dp->nama_kades; ?></td>
        <td>
          <a href="<?= base_url('Admin/KadesController/edit/'.$dp->id) ?>" class="btn btn-info">Edit</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
    <br>
    <br>
</div>

<!-- /.container-fluid -->
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<?= $this->session->flashdata('pesan'); ?>
		</div>
	</div>

	<div class="card mb-3 col-lg-8">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('assets/profile/'.$user['foto_profile']) ?>" class="card-img" alt="img user">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">Username : <?= $user['username']; ?></h5>
					<p class="card-text">Nama Petugas : <?= $user['nama_petugas'] ?></p>
					<p class="card-text">Telp : <?= $user['telp'] ?></p>
					<a href="<?= base_url('Admin/ProfileController/edit_profil/'.$user['id_petugas']) ?>" class="btn btn-info">Edit</a>
					<a href="<?= base_url('Auth/ChangePasswordController') ?>" class="btn btn-info">Ganti Password</a>
					

				</div>
			</div>
		</div>
	</div>

</div>
        <!-- /.container-fluid
<?php $this->load->view('layout/header') ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url(); ?>Beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Manage</li>
          </ol>

          <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
		        <span class="badge badge-pill badge-success">Welcome</span>
		            Back di Coding Asik <?php echo $this->session->userdata('nama'); ?>
		          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		            <span aria-hidden="true">×</span>
		        </button>
		    </div>

</div>

        <!-- /.container-fluid -->

        <?php $this->load->view('layout/copyright') ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


<?php $this->load->view('layout/footer_script') ?>
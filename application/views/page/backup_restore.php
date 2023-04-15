<?php $this->load->view('layout/header') ?>
      <div id="content-wrapper">
            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url(); ?>Beranda">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Backup dan Restore</li>
          </ol>

          
          <p class="mb-4"></p>
          <?php echo $this->session->flashdata('message');?>

          <?php if ($this->session->userdata('level')=="Admin") { ?>
          <div class="row">
            
          
            <div class="col-md-6">
              <!-- Brand Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Backup</h6>
                </div>
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                    <form action="<?php echo base_url(); ?>Backup/backup" method="post">
                      
                     
                      <button type="submit" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-download"></i>
                        </span>
                        <span class="text">Klik untuk Backup database</span>
                      </button>
                    </form>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Brand Buttons -->
              <div class="card shadow mb-12">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Restore</h6>
                </div>
                <div class="card-body card-block">
                  <div class="col-md-12">
                    <form enctype='multipart/form-data' action="<?php echo base_url(); ?>Backup/restore" method="POST">
                    <div class="row form-group">
                      <div class="col-6">
                        <div class="row form-group">
                          <label for="cc-payment" class="control-label mb-1">Pilih File *.sql</label>
                          <input id="cc-payment" name="datafile" type="file" class="form-control" aria-required="true" aria-invalid="false" required="">
                        </div>
                      </div>
                      <div class="col-6">
                        <div>
                          <label for="cc-payment" class="control-label mb-1">Klik untuk restore</label>
                          <button type="submit" class="btn btn-info btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Restore Database</span>
                          </button>
                        </div>
                      </div>
                    </div>
                      
                    </form>
                  </div>
                
                </div>
              </div>
            </div>
            </div>
            <?php } ?>


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
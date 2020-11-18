<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Harilab - Contact Us</title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url() ?>assets-backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets-backend/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>assets-backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

            <?php $this->load->view('admin/_partials/sidebar_container') ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php $this->load->view('admin/_partials/navbar') ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Contact Us</h1>

                        <!-- DataTales -->
                        <div class="card shadow mb-4">
                            <!-- <div class="card-header">
                                <a href="<?php echo site_url('admin/settings') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                            </div> -->
                            <div class="card-body">
                                <form action="<?php base_url('admin/contact/edit') ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id_contact" value="<?php echo $contact->id_contact ?>" />
                                    <div class="form-group">
                                        <label for="alamat_short">Alamat</label>
                                        <input class="form-control <?php echo form_error('alamat_short') ? 'is-invalid' : '' ?>" type="text" name="alamat_short" placeholder="" value="<?php echo $contact->alamat_short ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('alamat_short') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_long">Alamat Lengkap</label>
                                        <input class="form-control <?php echo form_error('alamat_long') ? 'is-invalid' : '' ?>" type="text" name="alamat_long" placeholder="" value="<?php echo $contact->alamat_long ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('alamat_long') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_tlp">Nomor Telepon</label>
                                        <input class="form-control <?php echo form_error('no_tlp') ? 'is-invalid' : '' ?>" type="text" name="no_tlp" placeholder="" value="<?php echo $contact->no_tlp ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('no_tlp') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="" value="<?php echo $contact->email ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('email') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input class="form-control <?php echo form_error('twitter') ? 'is-invalid' : '' ?>" type="url" name="twitter" placeholder="" value="<?php echo $contact->twitter ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('email') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="fb">Facebook</label>
                                        <input class="form-control <?php echo form_error('fb') ? 'is-invalid' : '' ?>" type="url" name="fb" placeholder="" value="<?php echo $contact->fb ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('fb') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input class="form-control <?php echo form_error('instagram') ? 'is-invalid' : '' ?>" type="url" name="instagram" placeholder="" value="<?php echo $contact->instagram ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('instagram') ?>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="image_banner">Image Banner</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?php echo form_error('image_banner') ? 'is-invalid' : '' ?>" id="customFile" name="image_banner">
                                            <label class="custom-file-label" for="customFile"><?php echo $settings->image_banner ?></label>
                                            <input type="hidden" name="old_image" value="<?php echo $settings->image_banner ?>" />
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('image') ?>
                                        </div>
                                    </div> -->

                                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                                </form>

                            </div>

                            <!-- <div class="card-footer small text-muted">
                                * Diperlukan
                            </div> -->
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php $this->load->view('admin/_partials/footer') ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php $this->load->view("admin/_partials/logout_modal") ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets-backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets-backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets-backend/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets-backend/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets-backend/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets-backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets-backend/js/demo/datatables-demo.js"></script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Harilab - Edit Data Proyek</title>

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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
                        <h1 class="h3 mb-2 text-gray-800">Edit Data Proyek</h1>
                        <!-- <p class="mb-4">Input data na bari ngopi euyy ngeunahh segerr</a>.</p> -->

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <a href="<?php echo site_url('admin/proyek') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <div class="card-body">
                                <form action="<?php base_url('admin/proyek/edit') ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id_proyek" value="<?php echo $proyek->id_proyek ?>" />
                                    <div class="form-group">
                                        <label for="nama_proyek">Nama Proyek</label>
                                        <input class="form-control <?php echo form_error('nama_proyek') ? 'is-invalid' : '' ?>" type="text" name="nama_proyek" placeholder="" value="<?php echo $proyek->nama_proyek ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nama_proyek') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Link Proyek</label>
                                        <input class="form-control <?php echo form_error('url') ? 'is-invalid' : '' ?>" type="url" name="url" placeholder="" value="<?php echo $proyek->url ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('url') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Gambar Thumbnail</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?php echo form_error('image') ? 'is-invalid' : '' ?>" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile"><?php echo $proyek->image ?></label>
                                            <input type="hidden" name="old_image" value="<?php echo $proyek->image ?>" />
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('image') ?>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="category">Kategori</label>
                                        <select class="form-control <?php echo form_error('category') ? 'is-invalid' : '' ?>" name="category" placeholder="">
                                            <option value="<?php echo $proyek->category ?>"><?php echo $proyek->category ?></option>
                                            <option value="Wedding Virtual">Wedding Virtual</option>
                                            <option value="Prewedding">Prewedding</option>
                                            <option value="Video Clip">Video Clip</option>
                                            <option value="Event Virtual ">Event Virtual</option>
                                            <option value="Event Organizer">Event Organizer</option>
                                            <option value="Multimedia Streaming System">Multimedia Streaming System</option>
                                            <option value="TV Commercial">TV Commercial</option>
                                            <option value="Music Production (Recording)">Music Production (Recording)</option>
                                            <option value="Music Production (Mixing)">Music Production (Mixing)</option>
                                            <option value="Music Production (Mastering)">Music Production (Mastering)</option>
                                            <option value="Behind The Scenes (Foto)">Behind The Scenes (Foto)</option>
                                            <option value="Behind The Scenes (Video)">Behind The Scenes (Video)</option>
                                            <option value="Company Profile">Company Profile</option>
                                            <option value="Foto Product">Foto Product</option>
                                            <option value="Digital Video Product">Digital Video Product </option>
                                            <option value="Motion Graphic & Info Grafis">Motion Graphic & Info Grafis</option>
                                            <option value="3D Animation">3D Animation</option>
                                            <option value="Design Graphic">Design Graphic</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('category') ?>
                                        </div>
                                    </div>


                                    <!-- <div class="form-group">
								<label for="pendapatan">Pendapatan per Bulan*</label>
								<input class="form-control <?php echo form_error('pendapatan') ? 'is-invalid' : '' ?>"
								 type="text" name="pendapatan" placeholder="" />
								<div class="invalid-feedback">
									<?php echo form_error('pendapatan') ?>
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
                <?php $this->load->view('admin/_partials/footer')?>
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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Harilab - Edit Data Team</title>

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
                        <h1 class="h3 mb-2 text-gray-800">Edit Data Anggota Team</h1>
                        <!-- <p class="mb-4">Input data na bari ngopi euyy ngeunahh segerr</a>.</p> -->

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <a href="<?php echo site_url('admin/team') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                            <div class="card-body">
                                <form action="<?php base_url('admin/team/edit') ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id_anggota" value="<?php echo $team->id_anggota ?>" />
                                    <div class="form-group">
                                        <label for="nama_anggota">Nama Anggota</label>
                                        <input class="form-control <?php echo form_error('nama_anggota') ? 'is-invalid' : '' ?>" type="text" name="nama_anggota" placeholder="" value="<?php echo $team->nama_anggota?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('nama_anggota') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select class="form-control <?php echo form_error('jabatan') ? 'is-invalid' : '' ?>" name="jabatan" placeholder="">
                                            <option value="<?php echo $team->jabatan?>"><?php echo $team->jabatan?></option>
                                            <option value="Direktur">Direktur</option>
                                            <option value="Audio Visual">Audio Visual</option>
                                            <option value="Video Editor">Video Editor</option>
                                            <option value="Web Programmer">Web Programmer</option>
                                            <option value="Konsultan Pertanian">Konsultan Pertanian</option>
                                            <option value="Radio Promotion">Radio Promotion</option>
                                            <option value="Supervisi">Supervisi</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('category') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input class="form-control <?php echo form_error('url') ? 'is-invalid' : '' ?>" type="text" name="instagram" placeholder="" value="<?php echo $team->instagram?>"/>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('instagram') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input class="form-control <?php echo form_error('twitter') ? 'is-invalid' : '' ?>" type="text" name="twitter" placeholder="" value="<?php echo $team->twitter?>"/>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('twitter') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="fb">Facebook</label>
                                        <input class="form-control <?php echo form_error('fb') ? 'is-invalid' : '' ?>" type="text" name="fb" placeholder="" value="<?php echo $team->fb?>"/>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('fb') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn</label>
                                        <input class="form-control <?php echo form_error('linkedin') ? 'is-invalid' : '' ?>" type="text" name="linkedin" placeholder="" value="<?php echo $team->linkedin?>"/>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('linkedin') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar Thumbnail</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?php echo form_error('image') ? 'is-invalid' : '' ?>" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile"><?php echo $team->image ?></label>
                                            <input type="hidden" name="old_image" value="<?php echo $team->image ?>" />
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('image') ?>
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
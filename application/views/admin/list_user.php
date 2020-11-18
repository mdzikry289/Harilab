<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Harilab Admin - Lihat Data User</title>

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

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Data </h1> -->
                    <!-- <p class="mb-4">Input data na bari ngopi euyy ngeunahh segerr</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <a href="<?php echo site_url('admin/users/add') ?>"><i class="fas fa-plus"></i> Tambah Data User</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <!-- <th>Password</th> -->
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user as $u) : ?>
                                            <tr>
                                                <td width="250">
                                                    <?php echo $u->nama_user ?>
                                                </td>
                                                <td>
                                                    <?php echo $u->username ?>
                                                </td>
                                                <!-- <td>
                                                    <?php echo $u->password ?>
                                                </td> -->
                                                <td>
                                                    <?php echo $u->level ?>
                                                </td>
                                                <td>
                                                    <img src="<?= base_url('uploads/user_img/' . $u->image_users) ?>" width="64">
                                                </td>
                                                <td width="250">
                                                    <?php if ($u->level == 'SuperAdmin' ) : ?>
                                                        <button class="btn btn-small" disabled><i class="fas fa-edit"></i> Edit</a></button>
                                                        <button class="btn btn-small" disabled><i class="fas fa-trash"></i> Hapus</a></button>
                                                    <?php else : ?>
                                                        <a href="<?php echo site_url('admin/users/edit/' . $u->id_user) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('admin/users/delete/' . $u->id_user) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                    <?php endif; ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

    <!-- Logout Delete Confirmation-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>

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
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

</body>

</html>
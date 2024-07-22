<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('sb-admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('sb-admin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('sb-admin/'); ?>css/sb-admin-2-custom.css" rel="stylesheet">

    <!-- datatables -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"> -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('admin/sidebar'); ?>
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
          
          <!-- Main Content -->
          <div id="content">
            
            <!-- Topbar -->
              <?= $this->include('admin/topbar'); ?>
              <!-- End of Topbar -->

              <!-- Begin Page Content -->
              <?= $this->renderSection('adminContent'); ?>
              <!-- End of Page Content -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Virgiawan 2023</span>
                    </div>
                </div>
            </footer>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="/logout">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('sb-admin/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sb-admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('sb-admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('sb-admin/'); ?>js/sb-admin-2.min.js"></script>

    <!-- DataTables -->
    <link href="<?= base_url('dataTables/'); ?>css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="<?= base_url('dataTables/'); ?>js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('dataTables/'); ?>js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <!-- datetimepicker -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#tablePosts').DataTable({
        //   "order": [
        //       [0, "asc"]
        //   ],
          pageLength: 7,
          lengthMenu: [
              [7, 15, 30, 50, -1],
              [7, 15, 30, 50, 'Semua']
          ]
        });
      });
    </script>
</body>

</html>
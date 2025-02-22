<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('template/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('template/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('template/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>vendor/select2/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?= base_url('Admin/home') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-database"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPK TOPSIS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $title == 'Kriteria' ? 'active' : "" ?>">
                <a class="nav-link" href="<?= base_url('Admin/kriteria') ?>">
                    <i class="fas fa-cube"></i>
                    <span>Kriteria</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $title == 'Sub Kriteria' ? 'active' : "" ?>">
                <a class="nav-link" href="<?= base_url('Admin/sub_kriteria') ?>">
                    <i class="fas fa-cubes"></i>
                    <span>Sub Kriteria</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $title == 'Alternatif' ? 'active' : "" ?>">
                <a class="nav-link" href="<?= base_url('Admin/alternatif') ?>">
                    <i class="fas fa-users"></i>
                    <span>Alternatif</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $title == 'Penilaian' ? 'active' : "" ?>">
                <a class="nav-link" href="<?= base_url('Admin/penilaian') ?>">
                    <i class="fas fa-star-half-alt"></i>
                    <span>Penialaian</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $title == 'Perhitungan' ? 'active' : "" ?>">
                <a class="nav-link" href="<?= base_url('Admin/perhitungan') ?>">
                    <i class="fas fa-calculator"></i>
                    <span>Perhitungan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $title == 'User' ? 'active' : "" ?>">
                <a class="nav-link" href="<?= base_url('Admin/user') ?>">
                    <i class="fas fa-user"></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $title == 'Laporan Penilaian' ? 'active' : "" ?>">
                <a class="nav-link" href="<?= base_url('Admin/ranking') ?>">
                    <i class="fas fa-trophy"></i>
                    <span>Laporan Penilaian</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <i class="fas fa-user-circle fa-lg"></i>
                                <!-- <img class="img-profile rounded-circle"
                                    src="<?= base_url('template/') ?>img/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" onclick="con()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?= $this->renderSection('content') ?>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
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

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('template/') ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('template/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('template/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('template/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('template/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <!-- <script src="https://cdn.datatables.net/v/bs4/dt-2.1.2/b-3.1.0/b-colvis-3.1.0/b-html5-3.1.0/datatables.min.js">
        </script> -->


        <!-- <script src="https://cdn.datatables.net/v/bs4/dt-2.1.2/b-3.1.0/b-html5-3.1.0/b-print-3.1.0/datatables.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script> -->

        <script src="<?= base_url('template/') ?>js/demo/datatables-demo.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('template/') ?>js/sb-admin-2.min.js"></script>

        <!-- SweetAlert -->
        <script src="<?= base_url('template/') ?>vendor/sweetalert/dist/sweetalert2.all.min.js"></script>

        <!-- Select2 -->
        <script src="<?= base_url('template/') ?>vendor/select2/select2.min.js"></script>

        <script>
        // Logout
        function con() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan logout!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('logout') ?>';
                }
            })
        }

        // Hapus Kriteria
        function hapus_kriteria(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus kriteria!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('Admin/kriteria/delete/') ?>' + id;
                }
            })
        }

        // Hapus Sub Kriteria
        function hapus_sub_kriteria(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus sub kriteria!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('Admin/sub_kriteria/delete/') ?>' + id;
                }
            })
        }

        // Hapus Alternatif
        function hapus_alternatif(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus alternatif!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('Admin/alternatif/delete/') ?>' + id;
                }
            })
        }


        $(function() {
            $('[data-tooltip="tooltip"]').tooltip()
        })

        // $(function() {
        //     var highest = {},
        //         highestValues = {};

        //     $('#terbobot tbody td').each(function(i, td) {
        //         var colIndex = $(td).index() - 1;
        //         var rowIndex = $(td).parent().index();
        //         var currValue = parseInt($(td).text(), 10);

        //         console.log(colIndex);

        //         var currHighest = highestValues[colIndex] || 0;

        //         if (currValue > currHighest) {
        //             highest[colIndex] = [rowIndex];
        //             highestValues[colIndex] = currValue;
        //         } else if (currValue === currHighest) {
        //             highest[colIndex].push(rowIndex);
        //         }
        //     });

        //     console.log(highest, highestValues);

        //     for (col in highest) {
        //         for (row in highest[col]) {
        //             $('#terbobot tbody tr').eq(highest[col][row]).find('td').eq(col).css('background',
        //                 'yellow');
        //         }
        //     }
        // });
        </script>

        <!-- Alert success -->
        <?php
        if (session()->has('success')) : ?>
        <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '<?= session('success') ?>',
            icon: 'success',
        })
        </script>
        <?php endif; ?>

        <!-- Alert error -->
        <?php
        if (session()->has('error')) : ?>
        <script>
        Swal.fire({
            title: 'Error!',
            text: '<?= session('error') ?>',
            icon: 'error',
        })
        </script>
        <?php endif; ?>

</body>

</html>
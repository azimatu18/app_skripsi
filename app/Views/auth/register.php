<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Gedrian Intimed Abadi</title>
    <link rel="shortcut icon" type="image/png" href="/admin/images/logos/logocv.png" />
    <link rel="stylesheet" href="/admin/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
        data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Area register -->
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-4">
                        <div class="card shadow-lg rounded-4">
                            <div class="card-body p-5">

                                <!-- Logo -->
                                <div class="text-center mb-4">
                                    <a href="/" class="d-block">
                                        <img src="/admin/images/logos/logo.png" width="120" alt="Logo">
                                    </a>
                                    <h4 class="mt-3 fw-bold text-dark">BUAT AKUN BARU</h4>
                                    <p class="text-muted">Silakan isi form di bawah ini</p>
                                </div>

                                <!-- Form Register -->
                                <form action="/register/submit" method="POST">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama lengkap" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email aktif" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                                    </div>

                                    <!-- Tombol registrasi -->
                                    <button type="submit" class="btn btn-primary w-100 py-2 fs-5" style="background-color: #003366;">
                                        Registrasi
                                    </button>

                                    <!-- Link ke login -->
                                    <div class="d-flex align-items-center justify-content-center mt-4">
                                        <p class="mb-0">Sudah punya akun?</p>
                                        <a href="/login" class="text-primary fw-bold ms-2">Login</a>
                                    </div>
                                </form>

                            </div> <!-- End card-body -->
                        </div> <!-- End card -->
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End page-wrapper -->

    <?php if (!empty(session()->getFlashdata('success'))): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "<?= session()->getFlashdata('success') ?>"
            })
        </script>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('error'))): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "<?= session()->getFlashdata('error') ?>"
            })
        </script>
    <?php endif ?>

    <!-- Javascript -->
    <script src="/admin/libs/jquery/dist/jquery.min.js"></script>
    <script src="/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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
  <!-- Wrapper halaman utama -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical"
    data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Area login -->
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-4">
            <div class="card shadow-lg rounded-4">
              <div class="card-body p-5">

                <!-- Logo dan sambutan -->
                <div class="text-center mb-4">
                  <a href="/" class="d-block mb-2">
                    <img src="/admin/images/logos/logo.png" width="120" alt="Logo">
                  </a>
                  <p class="text-muted">Silakan masuk ke akun Anda</p>
                </div>

                <!-- Form login -->
                <form action="/login/submit" method="POST">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                  </div>

                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                  </div>

                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label text-dark" for="rememberMe">
                        Ingat saya
                      </label>
                    </div>
                    <div class="d-flex">
                      <!-- <p class="mb-0">Lupa pasword?</p> -->
                      <a href="/lupa-password" class="text-primary fw-bold ms-2">Lupa password?</a>
                    </div>
                  </div>


                  <!-- Pesan error kalau login gagal -->
                  <?php if (session()->has('pesan')): ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                      <div>
                        <?= session('pesan') ?>
                      </div>
                    </div>
                  <?php endif; ?>


                  <!-- Tombol submit -->
                  <button type="submit" class="btn btn-primary w-100 py-2 fs-5" style="background-color: #003366;">
                    Login
                  </button>

                  <!-- Link ke halaman register -->
                  <div class="d-flex align-items-center justify-content-center mt-4">
                    <p class="mb-0">Belum punya akun?</p>
                    <a href="/register" class="text-primary fw-bold ms-2">Registrasi</a>
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

  <!-- Javascript -->
  <script src="/admin/libs/jquery/dist/jquery.min.js"></script>
  <script src="/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
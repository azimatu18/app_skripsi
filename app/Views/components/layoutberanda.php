<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="/homepage/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="/homepage/css/tiny-slider.css" rel="stylesheet">
	<link href="/homepage/css/style.css" rel="stylesheet">
	<link href="/homepage/css/custom.css" rel="stylesheet">
	<title>CV Gedrian Intimed Abadi</title>
	<link rel="shortcut icon" type="image/png" href="/admin/images/logos/logocv.png" />
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/jquery.min.js"></script>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<img src="/homepage/images/logocv.png" class="img-fluid" style="height: 50px;">


			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<?php $current_url = $_SERVER['REQUEST_URI']; ?>

				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">

					<li class="nav-item <?= ($current_url == '/' ? 'active' : '') ?>">
						<a class="nav-link" href="/">Dashboard</a>
					</li>
					<li class="nav-item <?= (strpos($current_url, '/shop') !== false ? 'active' : '') ?>">
						<a class="nav-link" href="/shop">Toko</a>
					</li>
					<li class="nav-item <?= (strpos($current_url, '/about') !== false ? 'active' : '') ?>">
						<a class="nav-link" href="/about">Tentang</a>
					</li>
					<li class="nav-item <?= (strpos($current_url, '/contact') !== false ? 'active' : '') ?>">
						<a class="nav-link" href="/contact">Kontak</a>
					</li>
				</ul>
				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<?php if (session('user_id')): ?>
						<li class="nav-item <?= (strpos($current_url, '/daftar-pemesanan') !== false ? 'active' : '') ?>">
							<a class="nav-link" href="/daftar-pemesanan">Daftar Pemesanan</a>
						</li>
						<li>
							<div class="d-flex">
								<a class="nav-link" href="/keranjang"><img src="/homepage/images/cart.svg"></a>
								<div class="fw-bold">
									<div class="rounded-circle bg-white text-danger d-flex align-items-center justify-content-center" style="width: 20px; height: 20px">
										<span><?= App\Models\KeranjangModel::where('user_id', session('user_id'))->count() ?></span>
									</div>
								</div>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
								aria-expanded="false">
								<img src="/homepage/images/user.svg">
								<span class="text-white"><?= App\Models\UserModel::data()['nama'] ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
								<div class="message-body" style="width: 250px;">

									<a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
								</div>
							</div>
						</li>
					<?php else: ?>
						<li><a href="/login" class="btn btn-light">Login</a></li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Header/Navigation -->
	<?= $this->renderSection('konten') ?>
	<!-- Start Footer Section -->
	<footer class="footer-section" style="padding: 20px;">
		<div class="container relative">
			<div class="row g-5 mb-2">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><img src="/homepage/images/logo.png" class="img-fluid" style="height: 50px;"></div>
					<p class="mb-4">Jalan Palapa II Gang Venus Iringmulyo, Kec. Metro Timur, Kota Metro, Provinsi Lampung</p>

					<ul class="list-unstyled custom-social">
						<li><a href="#"><span class="fa fa-solid fa-envelope"></span></a></li>
						<li><a href="#"><span class="fa fa-solid fa-phone"></span></a></li>
					</ul>
				</div>

				<div class="col-lg-6">
					<div class="row links-wrap">
						<div class="col-6 col-sm-6 col-md-3">
							<a href="#">Dashboard</a>
						</div>
						<div class="col-6 col-sm-6 col-md-3">
							<a href="/shop">Toko</a>
						</div>
						<div class="col-6 col-sm-6 col-md-3">
							<a href="/about">Tentang</a>
						</div>
						<div class="col-6 col-sm-6 col-md-3">
							<a href="/contact">Kontak</a>
						</div>
					</div>
				</div>
			</div>

			<div class="border-top copyright">
				<div class="row pt-4">
					<div class="col-lg-6">
						<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script>. CV Gedrian Intimed Abadi &mdash; By <a href="https://www.linkedin.com/in/azimatu-al-munawwaroh-bb733627b/" target="_blank" rel="noopener noreferrer">Azimatu Al Munawwaroh</a> </p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer Section -->
	<?php if (session('user_id')): ?>
		<section id="chat-assist" style="display: none;">
			<div class="container py-5">
				<div class="row d-flex justify-content-center">
					<div class="col-12">
						<div class="card" id="chat2">
							<div class="card-header d-flex justify-content-between align-items-center p-3">
								<h5 class="mb-0">Chat</h5>
								<button type="button" class="btn btn-light btn-sm" id="btn-close-chat" data-mdb-ripple-color="dark">
									Tutup
								</button>
							</div>
							<div class="card-body" id="chat-body" data-mdb-perfect-scrollbar-init style="position: relative; height: 400px;overflow-y:scroll;">

							</div>
							<form id="form-chat" class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
								<img src="/homepage/images/user.png"
									alt="avatar 3" style="width: 40px; height: 100%;">
								<input type="hidden" id="form-chat-last_id" value="0">
								<input type="text" name="pesan" class="form-control form-control-lg" id="form-chat-pesan"
									placeholder="Ketik pesan" required>
								<button class="btn btn-light ms-3"><i class="fas fa-paper-plane"></i></button>
							</form>

						</div>

					</div>
				</div>

			</div>
		</section>


		<button id="chat-logo" class="btn-light" style="position:fixed; display:block; right: 20px; bottom: 20px; z-index:999; border-radius: 100%; width: 70px; height:70px;">
			<img src="/homepage/images/icon-chat.png" width="24" height="24" />
		</button>

		<?php if (!empty(session()->getFlashdata('error'))): ?>
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: "<?= session()->getFlashdata('error') ?>"
				})
			</script>
		<?php endif ?>

		<script>
			const chatSection = document.getElementById('chat-assist');
			const chatLogo = document.getElementById('chat-logo');
			const closeBtn = document.getElementById('btn-close-chat');

			// Ketika tombol tutup diklik, sembunyikan chat dan tampilkan logo
			closeBtn.addEventListener('click', function() {
				chatSection.style.display = 'none';
				chatLogo.style.display = 'block';
			});

			// Ketika logo chat diklik, tampilkan chat dan sembunyikan logo
			chatLogo.addEventListener('click', function() {
				chatSection.style.display = 'block';
				chatLogo.style.display = 'none';
				const chatBody = document.getElementById('chat-body');
				if (chatBody) {
					chatBody.scrollTop = chatBody.scrollHeight;
				}
			});

			//untuk ajax chat
			$(document).ready(function() {
				$('#form-chat').on('submit', function(e) {
					e.preventDefault();
					let pesan = $('#form-chat-pesan').val()
					let now = new Date();
					let waktu = now.getHours() + ":" + now.getMinutes()
					$.post('/chat/tambah', {
						pesan: pesan
					}, function(result) {
						$('#form-chat-last_id').val(result.last_id)
						$('#form-chat-pesan').val('')
						$('#chat-body').append(`
							<div class="d-flex flex-row justify-content-end mb-4 pt-1">
								<div>
									<p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${pesan}</p>
									<p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${waktu}</p>
								</div>
								<img src="/homepage/images/user.png"
									alt="avatar 1" style="width: 45px; height: 100%;">
							</div>
						`)
						const chatBody = document.getElementById('chat-body');
						if (chatBody) {
							chatBody.scrollTop = chatBody.scrollHeight;
						}
					})
				})

				setInterval(function() {
					var last_id = $('#form-chat-last_id').val()
					$.get('/chat/load', {
						last_id: last_id
					}, function(result) {
						let data = result.chat
						data.forEach(chat => {
							$('#form-chat-last_id').val(chat.id)
							if (chat.user_id) {
								$('#chat-body').append(`
								<div class="d-flex flex-row justify-content-start">
											<img src="/admin/images/profile/admin.png"
												alt="avatar 1" style="width: 45px; height: 100%;">
											<div>
												<p class="small p-2 ms-3 mb-1 rounded-3 bg-light">${chat.pesan}</p>
												<p class="small ms-3 mb-3 rounded-3 text-muted">${chat.waktu}</p>
											</div>
										</div>
								`)
							} else {
								$('#chat-body').append(`
							<div class="d-flex flex-row justify-content-end mb-4 pt-1">
								<div>
									<p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${chat.pesan}</p>
									<p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${chat.waktu}</p>
								</div>
								<img src="/homepage/images/user.png"
									alt="avatar 1" style="width: 45px; height: 100%;">
							</div>
						`)
							}

							let chatBody = document.getElementById('chat-body');
							if (chatBody) {
								chatBody.scrollTop = chatBody.scrollHeight;
							}
						});
					})
				}, 1000)
			})
		</script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const chatBody = document.getElementById('chat-body');
				if (chatBody) {
					chatBody.scrollTop = chatBody.scrollHeight;
				}
			});
		</script>

		<?php if (session()->getFlashdata('open_chat')) : ?>
			<script>
				document.addEventListener('DOMContentLoaded', function() {
					// Buka chat otomatis
					document.getElementById('chat-assist').style.display = 'block';
					document.getElementById('chat-logo').style.display = 'none';
					const chatBody = document.getElementById('chat-body');
					if (chatBody) {
						chatBody.scrollTop = chatBody.scrollHeight;
					}
				});
			</script>
		<?php endif; ?>
	<?php endif; ?>

	<script src="/homepage/js/bootstrap.bundle.min.js"></script>
	<script src="/homepage/js/tiny-slider.js"></script>
	<script src="/homepage/js/custom.js"></script>
</body>

</html>
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
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="/">Beranda</a>
					</li>
					<li><a class="nav-link" href="/shop">Toko</a></li>
					<li><a class="nav-link" href="/about">Tentang</a></li>
					<li><a class="nav-link" href="/contact">Kontak</a></li>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<?php if (session('is_login')): ?>
						<li><a class="nav-link" href="#"><img src="/homepage/images/user.svg"></a></li>
						<li><a class="nav-link" href="cart.html"><img src="/homepage/images/cart.svg"></a></li>
					<?php else: ?>
						<li><a href="/login" class="btn btn-light">Masuk</a></li>
					<?php endif ?>
				</ul>
			</div>
		</div>

	</nav>
	<!-- End Header/Navigation -->
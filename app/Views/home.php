<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

		<!-- Start Hero Section -->
			<div class="hero" style="padding: 80px;">
				<div class="container">
					<?php if (session('user_id')): ?>
						<div class="row justify-content-between">
							<div class="col-lg-5">
								<div class="intro-excerpt">
									<h2>Halo <?= App\Models\UserModel::data()['nama'] ?>, Selamat datang di CV Gedrian Intimed Abadi</h2>
									<p class="mb-4">CV Gedrian Intimed Abadi berkomitmen untuk menyediakan alat kesehatan berkualitas tinggi bagi rumah sakit, klinik, dan individu. Dedikasi kami memastikan solusi yang andal untuk mendukung kesehatan yang lebih baik. Kami hadir untuk memenuhi kebutuhan kesehatan Anda dengan inovasi dan pelayanan terbaik.</p>
									<p><a href="/shop" class="btn btn-secondary me-2">Belanja Sekarang</a></p>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="hero-img-wrap">
									<img src="/homepage/images/gabungan.png" class="img-fluid">
								</div>
							</div>
						</div>
					<?php else: ?>
						<div class="row justify-content-between">
							<div class="col-lg-5">
								<div class="intro-excerpt">
									<h2>CV GEDRIAN INTIMED ABADI</h2>
									<p class="mb-4">CV Gedrian Intimed Abadi berkomitmen untuk menyediakan alat kesehatan berkualitas tinggi bagi rumah sakit, klinik, dan individu. Dedikasi kami memastikan solusi yang andal untuk mendukung kesehatan yang lebih baik. Kami hadir untuk memenuhi kebutuhan kesehatan Anda dengan inovasi dan pelayanan terbaik.</p>
									<p><a href="/shop" class="btn btn-secondary me-2">Belanja Sekarang</a></p>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="hero-img-wrap">
									<img src="/homepage/images/gabungan.png" class="img-fluid">
								</div>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
						<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
						<p><a href="shop.html" class="btn">Explore</a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="/homepage/images/syringe.png" class="img-fluid product-thumbnail" style="height: 300px; object-fit:cover;">
							<h3 class="product-title">Syringe Pump</h3>
							<div class="product-type">Type: VP5</div> <!-- Menggunakan div untuk pemisah -->
							<strong class="product-price">Rp. 25.161.750</strong>

							<span class="icon-cross">
								<img src="/homepage/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>

					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="/homepage/images/pulse.png" class="img-fluid product-thumbnail" style="height: 300px; object-fit:cover;">
							<h3 class="product-title">Pulse Oxymeter</h3>
							<div class="product-type">Type: PM60</div>
							<strong class="product-price">Rp. 15.577.250</strong>

							<span class="icon-cross">
								<img src="/homepage/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="/homepage/images/defibrillation.png" class="img-fluid product-thumbnail" style="height: 300px; object-fit:cover;">
							<h3 class="product-title">Defibrilator</h3>
							<div class="product-type">Type: Beneheart D3</div>
							<strong class="product-price">Rp. 107.187.500</strong>

							<span class="icon-cross">
								<img src="/homepage/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 4 -->

				</div>
			</div>
		</div>
		<!-- End Product Section -->

<?php include('components/kelebihan.php') ?>

<?= $this->endSection() ?>



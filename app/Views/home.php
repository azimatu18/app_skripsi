<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<!-- Start Hero Section -->
<div class="hero" style="padding: 70px;">
	<div class="container">
		<?php if (session('user_id')): ?>
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h2>Halo <?= App\Models\UserModel::data()['nama'] ?>, Selamat datang di CV. Gedrian Intimed Abadi</h2>
						<p class="mb-2"><strong>Visi:</strong><br>
							Menjadi perusahaan yang tumbuh dan berkembang melalui
							perdagangan besar alat kesehatan dan melakukan after maintenance
							perangkat medis di Lampung dengan skala nasional.
						</p>

						<p class="mb-2"><strong>Misi:</strong><br>
							Memberikan kontribusi untuk meningkatkan pelayanan kesehatan
							masyarakat melalui penyediaan produk kesehatan yang bagus dan
							berorientasi pada kesehatan pasien.
						</p>
						<p><a href="/shop" class="btn btn-secondary me-2">Belanja Sekarang</a></p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="/homepage/images/gabungan.png" class="img-fluid" style="padding-top: 50px;">
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h2>CV. GEDRIAN INTIMED ABADI</h2>
						<p class="mb-2"><strong>Visi:</strong><br>
							Menjadi perusahaan yang tumbuh dan berkembang melalui
							perdagangan besar alat kesehatan dan melakukan after maintenance
							perangkat medis di Lampung dengan skala nasional.
						</p>

						<p class="mb-2"><strong>Misi:</strong><br>
							Memberikan kontribusi untuk meningkatkan pelayanan kesehatan
							masyarakat melalui penyediaan produk kesehatan yang bagus dan
							berorientasi pada kesehatan pasien.
						</p>
						<p><a href="/shop" class="btn btn-secondary me-2">Belanja Sekarang</a></p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="/homepage/images/gabungan.png" class="img-fluid" style="padding-top: 50px;">
					</div>
				</div>
			</div>
		<?php endif ?>
	</div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section" style="padding: 60px;">
	<div class="container">
		<div class="row">
			<!-- Start Column 1 -->
			<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
				<h2 class="mb-4 section-title">Mitra Terpercaya Kebutuhan Alat Kesehatan Anda</h2>
				<p class="mb-4">CV Gedrian Intimed Abadi berkomitmen untuk menyediakan alat kesehatan berkualitas tinggi. Kami hadir untuk memenuhi kebutuhan kesehatan Anda dengan inovasi dan pelayanan terbaik.</p>
				<p><a href="/shop" class="btn">Belanja Sekarang</a></p>
			</div>
			<!-- End Column 1 -->
			<?php foreach ($produk_lain as $no => $data): ?>

				<!-- Start Column 2 -->
				<div class="col-12 col-md-4 col-lg-3 mb-5">
					<a class="product-item" href="/detail_produk/<?= $data['id'] ?>">
						<div class="product-item-hover">
							<button class="btn btn-sm btn-primary">Detail</button>
						</div>
						<img src="<?= base_url('uploads/gambar/' . $data['gambar']) ?>" class="img-fluid product-thumbnail" style="height: 300px; object-fit:cover;">
						<h3 class="product-title"><?= $data['judul'] ?></h3>
						<div class="product-type">Type: <?= $data['tipe'] ?></div> <!-- Menggunakan div untuk pemisah -->
						<?php if ($data['diskon']): ?>
							<span style="text-decoration: line-through;">Rp. <?= number_format($data['harga'], 0, '.', '.') ?></span> <br>
						<?php endif ?>
						<strong class="product-price">Rp. <?= number_format(($data['harga'] - ($data['harga'] * $data['diskon'] / 100)), 0, '.', '.') ?></strong>

						<form action="/keranjang/tambah/<?= $data['id'] ?>" method="post" class="d-flex align-items-center">
							<button type="submit" class="icon-cross rounded-circle bg-dark p-2" style="background: none; border: none; padding: 0;">
								<img src="/homepage/images/cross.svg" class="img-fluid">
							</button>
						</form>
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<!-- End Product Section -->

<?php include('components/kelebihan.php') ?>

<?= $this->endSection() ?>
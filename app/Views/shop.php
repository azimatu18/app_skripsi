<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<!-- Start Hero Section -->
<div class="hero" style="padding: 60px;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h2 style="white-space: nowrap;">Alat Kesehatan Yang Tersedia</h2>
                </div>
            </div>
            <div class="col-lg-7">
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <?php foreach ($data_produk as $no => $produk): ?>
                <!-- Start Column 1 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="/detail_produk/<?= $produk['id'] ?>">
                        <div class="product-item-hover">
                            <button class="btn btn-sm btn-primary">Detail</button>
                        </div>
                        <img src="<?= base_url('uploads/gambar/' . $produk['gambar']) ?>" class="img-fluid product-thumbnail" style="height: 300px; object-fit:cover;">
                        <h3 class="product-title"><?= $produk['judul'] ?></h3>
                        <div class="product-type">Type: <?= $produk['tipe'] ?></div> <!-- Menggunakan div untuk pemisah -->
                        <strong class="product-price">Rp. <?= number_format($produk['harga'], 0, '.', '.') ?></strong>

                        <span class="icon-cross">
                            <img src="/homepage/images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 1 -->
            <?php endforeach ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<!-- Start Product Detail Section -->
<div class="product-section" style="padding: 70px;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Product Image -->
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="border rounded overflow-hidden shadow-sm">
                    <img src="<?= base_url('uploads/gambar/' . $produk['gambar']) ?>" class="img-fluid" alt="<?= $produk['judul'] ?>" style="object-fit:cover; width:100%; height:auto;">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <div class="ps-md-5">
                    <h2 class="display-5 fw-bold mb-3"><?= $produk['judul'] ?></h2>
                    <div class="mb-3">
                        <span class="badge" style="font-size:14px; background: #003366">Tipe: <?= $produk['tipe'] ?></span>
                    </div>
                    <?php if ($produk['diskon']): ?>
                        <div style="text-decoration: line-through;">Rp. <?= number_format($produk['harga'], 0, '.', '.') ?></div> <br>
                    <?php endif ?>
                    <div class="text-black fw-bold h4 mb-4">Rp. <?= number_format(($produk['harga'] - ($produk['harga'] * $produk['diskon'] / 100)), 0, '.', '.') ?></div>

                    <p class="mb-4" style="font-size: 16px;">
                        <?= nl2br($produk['deskripsi']) ?>
                    </p>

                    <form action="/keranjang/tambah/<?= $produk['id'] ?>" method="post" class="d-flex align-items-center">
                        <input type="number" name="jumlah" id="inputQuantity" value="1" min="1" class="form-control me-3 text-center" style="width: 80px;" required />
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-cart-plus-fill me-2"></i>Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Detail Section -->

<!-- Start Related Products Section -->
<div class="product-section" style="background-color: #f8f9fa; padding: 60px 0;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Produk Terkait</h2>
        </div>
        <div class="row">
            <?php foreach ($produk_lain as $data): ?>
                <div class="col-12 col-md-6 col-lg-3 mb-5">
                    <a href="/detail_produk/<?= $data['id'] ?>" class="product-item position-relative text-decoration-none text-dark">
                        <div class="product-item-hover position-absolute top-0 end-0 m-2" style="z-index: 1;">
                            <button class="btn btn-sm btn-primary">Detail</button>
                        </div>
                        <img src="<?= base_url('uploads/gambar/' . $data['gambar']) ?>" class="img-fluid product-thumbnail w-100" style="height: 300px; object-fit: cover;" alt="<?= $data['judul'] ?>" style="height: 250px; object-fit: cover; width: 100%;">

                        <h3 class="product-title mt-2"><?= $data['judul'] ?></h3>
                        <div class="product-type text-muted" style="font-size: 14px;">Tipe: <?= $data['tipe'] ?? '-' ?></div>
                        
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
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End Related Products Section -->

<?= $this->endSection() ?>
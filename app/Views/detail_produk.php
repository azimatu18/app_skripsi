<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<!-- Start Product Detail Section -->
<div class="product-section" style="padding: 70px;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Product Image -->
            <div class="col-md-6 mb-5 mb-md-0">
                <div class="border rounded overflow-hidden shadow-sm">
                    <img src="<?= base_url('uploads/gambar/'.$produk['gambar']) ?>" class="img-fluid" alt="<?= $produk['judul'] ?>" style="object-fit:cover; width:100%; height:auto;">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <div class="ps-md-5">
                    <h2 class="display-5 fw-bold mb-3"><?= $produk['judul'] ?></h2>
                    <div class="mb-3">
                        <span class="badge" style="font-size:14px; background: #003366" >Tipe: <?= $produk['tipe'] ?></span>
                    </div>
                    <div class="text-danger h4 mb-4">Rp. <?= number_format($produk['harga'],0,'.','.') ?></div>
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
            <?php foreach($produk_lain as $data): ?>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <a href="/detail_produk/<?= $data['id'] ?>" class="product-item text-decoration-none text-dark">
                    <div class="border rounded shadow-sm overflow-hidden mb-3">
                        <img src="<?= base_url('uploads/gambar/'.$data['gambar']) ?>" class="img-fluid" alt="<?= $data['judul'] ?>" style="height: 250px; object-fit: cover; width: 100%;">
                    </div>
                    <h5 class="product-title text-center"><?= $data['judul'] ?></h5>
                    <div class="product-type text-center text-muted" style="font-size: 14px;">Tipe: <?= $data['tipe'] ?? '-' ?></div>
                    <div class="product-price text-center fw-bold mt-2 text-danger">Rp. <?= number_format($data['harga'],0,'.','.') ?></div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End Related Products Section -->

<?= $this->endSection() ?>

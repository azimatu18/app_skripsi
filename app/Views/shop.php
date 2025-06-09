<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<!-- Start Hero Section -->
<div class="hero" style="padding: 30px;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h2 style="white-space: nowrap;">Produk Pengadaan</h2>
                    <form method="get" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari produk..." value="<?= esc($_GET['cari'] ?? '') ?>">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section" style="padding-bottom: 10px;">
    <div class="container">
        <div class="row">
            <?php foreach ($data_produk as $no => $produk): ?>
                <!-- fitur cari produk -->
                <?php
                $cari = $_GET['cari'] ?? '';
                if ($cari && stripos($produk['judul'], $cari) === false && stripos($produk['tipe'], $cari) === false) {
                    continue;
                }
                ?>
                <!-- Start Column -->
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="/detail_produk/<?= $produk['id'] ?>">
                        <div class="product-item-hover">
                            <button class="btn btn-sm btn-primary">Detail</button>
                        </div>
                        <img src="<?= base_url('uploads/gambar/' . $produk['gambar']) ?>" class="img-fluid product-thumbnail" style="height: 300px; object-fit:cover;">
                        <h3 class="product-title"><?= $produk['judul'] ?></h3>
                        <div class="product-type">Type: <?= $produk['tipe'] ?></div> <!-- Menggunakan div untuk pemisah -->
                        <?php if ($produk['diskon']): ?>
                            <span style="text-decoration: line-through;">Rp. <?= number_format($produk['harga'], 0, '.', '.') ?></span> <br>
                        <?php endif ?>
                        <strong class="product-price">Rp. <?= number_format(($produk['harga'] - ($produk['harga'] * $produk['diskon'] / 100)), 0, '.', '.') ?></strong>

                        <form action="/keranjang/tambah/<?= $produk['id'] ?>" method="post" class="d-flex align-items-center">
                            <button type="submit" class="icon-cross rounded-circle bg-dark p-2" style="background: none; border: none; padding: 0;">
                                <img src="/homepage/images/cross.svg" class="img-fluid">
                            </button>
                        </form>
                    </a>
                </div>
                <!-- End Column -->
            <?php endforeach ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
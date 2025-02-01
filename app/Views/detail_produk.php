<?php include('components/header.php') ?>

<body>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= base_url('uploads/gambar/'.$produk['gambar']) ?>" alt="..." /></div>
                <div class="col-md-6">
                    <div class=" mb-1">Tipe: <?= $produk['tipe'] ?></div>
                    <h1 class="display-5 fw-bolder"><?= $produk['judul'] ?></h1>
                    <div class="fs-5 mb-5">
                        <span>Rp. <?= number_format($produk['harga'],0,'.','.') ?></span>
                    </div>
                    <p class="lead">
                    <?= $produk['deskripsi'] ?>
                    </p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach($produk_lain as $data): ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="<?= base_url('uploads/gambar/'.$data['gambar']) ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $data['judul'] ?></h5>
                                <!-- Product price-->
                                Rp. <?= number_format($data['harga'],0,'.','.') ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/detail_produk/<?= $data['id'] ?>">Detail</a></div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <?php include('components/footer.php') ?>
<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary"><i class="bi bi-boxes me-2"></i>Validasi Produk</h4>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle table-hover">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk_menunggu as $no => $produk): ?>
                    <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $produk['judul'] ?></td>
                        <td><?= $produk['tipe'] ?></td>
                        <td><?= $produk['merek'] ?></td>
                        <td>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></td>
                        <td><?= $produk['diskon'] ?>%</td>
                        <td>
                            <img width="80" class="img-thumbnail" src="<?= base_url('uploads/gambar/' . $produk['gambar']) ?>" alt="gambar produk">
                        </td>
                        <td class="d-flex gap-2">
                            <form action="<?= base_url('admin/produk/setujui/' . $produk['id']) ?>" method="post">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Setujui
                                </button>
                            </form>

                            <form action="<?= base_url('admin/produk/tolak/' . $produk['id']) ?>" method="post">
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-x-circle"></i> Tolak
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
</div>
</div>

<?= $this->endSection() ?>
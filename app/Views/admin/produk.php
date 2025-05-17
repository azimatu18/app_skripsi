<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary"><i class="bi bi-boxes me-2"></i>Daftar Produk</h4>
        <a href="/admin/produk/tambah" class="btn btn-blue">
            <i class="bi bi-plus-circle me-1"></i> Tambah Produk
        </a>
    </div>

    <!-- Cari produk -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari produk...">
            </div>
            <script>
                document.getElementById('searchInput').addEventListener('keyup', function() {
                    const keyword = this.value.toLowerCase();
                    const rows = document.querySelectorAll('table tbody tr');

                    rows.forEach(row => {
                        const rowText = row.innerText.toLowerCase();
                        row.style.display = rowText.includes(keyword) ? '' : 'none';
                    });
                });
            </script>

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
                        <?php foreach ($data_produk as $no => $produk): ?>
                            <tr>
                                <td class="text-center"><?= $no + 1 ?></td>
                                <td><strong><?= $produk['judul'] ?></strong></td>
                                <td><span class="badge bg-secondary"><?= $produk['tipe'] ?></span></td>
                                <td><?= $produk['merek'] ?></td>
                                <td>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></td>
                                <td><?= $produk['diskon'] ?>%</td>
                                <td>
                                    <img width="80" class="img-thumbnail" src="<?= base_url('uploads/gambar/' . $produk['gambar']) ?>" alt="gambar produk">
                                </td>
                                <td class="text-center">
                                    <a href="/admin/produk/edit/<?= $produk['id'] ?>" class="btn btn-sm btn-warning mb-1">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="<?= base_url('admin/produk/hapus/' . $produk['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
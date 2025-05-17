<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <h4 class="text-primary mb-4"><i class="bi bi-pencil-square me-2"></i>Edit Produk</h4>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="<?= base_url('/admin/produk/update/' . $produk['id']) ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Produk</label>
                    <input type="text" name="judul" class="form-control" id="judul" value="<?= esc($produk['judul']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <input type="text" name="tipe" class="form-control" id="tipe" value="<?= esc($produk['tipe']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="merek" class="form-label">Merek</label>
                    <input type="text" name="merek" class="form-control" id="merek" value="<?= esc($produk['merek']) ?>">
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga" value="<?= esc($produk['harga']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon</label>
                    <input type="number" name="diskon" class="form-control" id="diskon" value="<?= esc($produk['diskon']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required><?= esc($produk['deskripsi']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label><br>
                    <img src="<?= base_url('uploads/gambar/' . $produk['gambar']) ?>" width="120" class="img-thumbnail mb-2">
                    <input type="file" name="gambar" class="form-control" id="gambar">
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                <a href="<?= base_url('/admin/produk') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
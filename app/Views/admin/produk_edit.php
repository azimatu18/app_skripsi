<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<style>
    .text-custom-blue {
        color: #003366;
    }
</style>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-custom-blue"><i class="bi bi-pencil-square me-2"></i>Edit Produk</h4>
        <a href="/admin/produk" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left-circle me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header" style="background-color: #003366; color: white;">
            <strong><i class="bi bi-pencil-fill me-2"></i>Form Edit Produk</strong>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/admin/produk/update/' . $produk['id']) ?>" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Judul Produk</label>
                        <input type="text" name="judul" class="form-control" value="<?= esc($produk['judul']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Type</label>
                        <input type="text" name="tipe" class="form-control" value="<?= esc($produk['tipe']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Merek</label>
                        <input type="text" name="merek" class="form-control" value="<?= esc($produk['merek']) ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga" class="form-control" value="<?= esc($produk['harga']) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Diskon</label>
                        <div class="input-group">
                            <input type="number" name="diskon" class="form-control" value="<?= esc($produk['diskon']) ?>">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <!-- Baris baru khusus gambar -->
                    <div class="col-12">
                        <label class="form-label">Ganti Gambar (Opsional)</label><br>
                        <img src="<?= base_url('uploads/gambar/' . $produk['gambar']) ?>" width="120" class="img-thumbnail mb-2 d-block">
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required><?= esc($produk['deskripsi']) ?></textarea>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end gap-1">
                    <button class="btn btn-blue px-4">
                        <i class="bi bi-save2 me-1"></i> Simpan Perubahan
                    </button>
                    <a href="<?= base_url('/admin/produk') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<style>
    .text-custom-blue {
        color: #003366;
    }
</style>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-custom-blue"><i class="bi bi-box-seam-fill me-2"></i>Tambah Produk</h4>
        <a href="/admin/produk" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left-circle me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header" style="background-color: #003366; color: white;">
            <strong><i class="bi bi-plus-circle me-2"></i>Form Tambah Produk</strong>
        </div>
        <div class="card-body">
            <form action="/admin/produk/submit" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Judul Produk</label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Alat Ukur Tekanan Darah" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Type</label>
                        <input type="text" name="tipe" class="form-control" placeholder="Contoh: Digital, Manual" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Merek</label>
                        <input type="text" name="merek" class="form-control" placeholder="Contoh: Digital, Manual" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 250000" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Diskon</label>
                        <div class="input-group">
                            <input type="number" name="diskon" class="form-control" placeholder="Contoh: 20" value="0">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gambar Produk</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tuliskan deskripsi lengkap produk..." required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')"></textarea>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <button class="btn btn-blue px-4">
                        <i class="bi bi-save2 me-1"></i> Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
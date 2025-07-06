<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<style>
    .text-custom-blue {
        color: #003366;
    }
</style>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-custom-blue"><i class="bi bi-pencil-square me-2"></i>Detail Pengajuan Edit Produk</h4>
        <a href="/admin/produk" class="btn btn-outline-primary">Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header mb-2" style="background-color: #003366; color: white;">
            <strong>Detail produk</strong>
        </div>
        <?php $level = App\Models\UserModel::data()['level'] ?>
        <class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="judul" class="form-control" value="<?= esc($produk['judul']) ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tipe</label>
                    <input type="text" name="tipe" class="form-control" value="<?= esc($produk['tipe']) ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Merek</label>
                    <input type="text" name="merek" class="form-control" value="<?= esc($produk['merek']) ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga" class="form-control" value="<?= esc($produk['harga']) ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Diskon</label>
                    <div class="input-group">
                        <input type="number" name="diskon" class="form-control" value="<?= esc($produk['diskon']) ?>" disabled>
                        <span class="input-group-text">%</span>
                    </div>
                </div>

                <!-- Baris baru khusus gambar -->
                <div class="col-12">
                    <label class="form-label">Gambar</label><br>
                    <img src="<?= base_url('uploads/gambar/' . $produk['gambar']) ?>" width="120" class="img-thumbnail mb-2 d-block">
                </div>

                <div class="col-12 mb-4">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" disabled><?= esc($produk['deskripsi']) ?></textarea>
                </div>
            </div>

            <?php if ($level == 'Manajer Pemasaran'): ?>
                <?php if ($permintaan_perubahan['status'] != 2 ): ?>

                    <div class="mb-4">
                        <div class=" d-flex align-items-end ">
                            <form action="<?= base_url('admin/produk/pengajuanDitolak/' . $permintaan_perubahan['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label for="alasan_penolakan" class="form-label fw-semibold">Alasan Penolakan</label>
                                    <textarea name="alasan_penolakan" id="alasan_penolakan" class="form-control" rows="2" required oninvalid="this.setCustomValidity('Harap isi alasan penolakan')" oninput="this.setCustomValidity('')"></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-x-circle me-1"></i> Tolak Pengajuan
                                </button>
                            </form>

                            <!-- Form & Tombol Setujui -->
                            <form action="<?= base_url('admin/produk/pengajuanDisetujui/' . $permintaan_perubahan['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn-success px-4">
                                    <i class="bi bi-check2-circle me-1"></i> Setujui
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endif ?>
            <?php endif ?>
            </class>
    </div>
</div>
</div>
<!-- Script Validasi -->
<!-- <script>
    function validateTolak() {
        const alasan = document.getElementById('alasan_penolakan').value.trim();
        if (alasan === '') {
            alert('Silakan isi alasan penolakan terlebih dahulu.');
            document.getElementById('alasan_penolakan').focus();
            return false; // mencegah submit
        }
        return true;
    }
</script> -->
<?= $this->endSection() ?>
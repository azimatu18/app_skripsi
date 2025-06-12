<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container py-4" style="padding-top: 100px!important;">
    <h3 class="mb-4 fw-bold">Dashboard Admin</h3>

    <div class="card">
        <div class="card-body">
            <h4>Selamat Datang</h4>
            <p>Halo, <?= App\Models\UserModel::data()['nama'] ?>. Anda Login Sebagai <?= App\Models\UserModel::data()['level'] ?></p>
        </div>
    </div>

    <?php $level = App\Models\UserModel::data()['level'] ?>
    <?php if ($level == 'Staf Pemasaran'): ?>
        <div class="row g-4 mb-4">
            <!-- Konsumen -->
            <div class="col-md-4">
                <div class="card text-white shadow-sm border-0" style="background-color: #4a6cf7; border-radius: 12px;">
                    <div class="card-body d-flex justify-content-between align-items-center" style="min-height: 120px;">
                        <div>
                            <h4 class="fw-bold mb-1"><?= $jumlah_konsumen ?></h4>
                            <div class="small">Konsumen</div>
                        </div>
                        <i class="ti ti-users" style="font-size: 42px;"></i>
                    </div>
                </div>
            </div>

            <!-- Produk -->
            <div class="col-md-4">
                <div class="card text-white shadow-sm border-0" style="background-color: #1ccab8; border-radius: 12px;">
                    <div class="card-body d-flex justify-content-between align-items-center" style="min-height: 120px;">
                        <div>
                            <h4 class="fw-bold mb-1"><?= $jumlah_produk ?></h4>
                            <div class="small">Produk</div>
                        </div>
                        <i class="ti ti-box" style="font-size: 42px;"></i>
                    </div>
                </div>
            </div>

            <!-- Pemesanan -->
            <div class="col-md-4">
                <div class="card text-white shadow-sm border-0" style="background-color: #f6b84b; border-radius: 12px;">
                    <div class="card-body d-flex justify-content-between align-items-center" style="min-height: 120px;">
                        <div>
                            <h4 class="fw-bold mb-1"><?= $jumlah_pemesanan ?></h4>
                            <div class="small">Pemesanan</div>
                        </div>
                        <i class="ti ti-shopping-cart" style="font-size: 42px;"></i>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>

<?= $this->endSection() ?>
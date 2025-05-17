<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container py-4">
    <h3 class="mb-4 fw-bold">Dashboard Admin</h3>

    <div class="row g-4 mb-4">
        <!-- Konsumen -->
        <div class="col-md-3">
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
        <div class="col-md-3">
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
        <div class="col-md-3">
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

    <!-- Tombol Chat -->
    <button id="chat-logo" class="btn-light" style="position:fixed; right: 20px; bottom: 20px; z-index:999; border-radius: 100%; width: 70px; height:70px;">
        <img src="/homepage/images/icon-chat.png" width="24" height="24" />
    </button>
</div>

<script>
    document.getElementById('chat-logo').addEventListener('click', function() {
        window.location.href = "<?= base_url('/admin/chat') ?>";
    });
</script>

<?= $this->endSection() ?>
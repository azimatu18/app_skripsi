<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex">
        <h4 class="me-auto">Daftar Produk</h4>
        <div>
            <a href="/admin/produk/tambah" class="btn btn-primary">Tambah Produk</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
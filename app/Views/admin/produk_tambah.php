<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex">
        <h4 class="me-auto">Tambah Produk</h4>
        <div>
            <a href="/admin/produk" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="/admin/produk/submit" method="post" enctype="multipart/form-data">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control mb-2" required>
                <label>Type</label>
                <input type="text" name="tipe" class="form-control mb-2" required>
                <label>Harga</label>
                <input type="number" name="harga" class="form-control mb-2" required>
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control mb-2" required>
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control mb-2" required>
                <button class="btn btn-primary mt-2">Tambah</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
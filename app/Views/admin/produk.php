<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex">
        <h4 class="me-auto">Daftar Produk</h4>
        <div>
            <a href="/admin/produk/tambah" class="btn btn-primary">Tambah Produk</a>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_produk as $no=>$produk): ?>
                        <tr>
                            <td><?= $no+1 ?></td>
                            <td><?= $produk['judul'] ?></td>
                            <td><?= $produk['tipe'] ?></td>
                            <td><?= $produk['harga'] ?></td>
                            <td><?= $produk['deskripsi'] ?></td>
                            <td><img width="80" src="<?= base_url('uploads/gambar/'.$produk['gambar']) ?>" alt=""></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
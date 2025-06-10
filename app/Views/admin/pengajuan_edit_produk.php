<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary"><i class="bi bi-boxes me-2"></i>Pengajuan Edit Produk</h4>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle table-hover">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_produk as $no => $produk): ?>
                    <tr>
                        <td class="text-center"><?= $no + 1 ?></td>
                        <td><strong><?php
                                    $data = json_decode($produk['data_baru'], true);
                                    echo $data['judul'];
                                    ?></strong></td>
                        <td><a href="/admin/produk/pengajuan_edit_produk/detail/<?= $produk['id'] ?>" class="btn btn-sm btn-warning mb-1">
                                <i class="bi bi-pencil"></i> Detail
                            </a></td>
                    </tr>
                <?php endforeach ?>

            </tbody>

        </table>
    </div>
</div>
</div>
</div>

<?= $this->endSection() ?>
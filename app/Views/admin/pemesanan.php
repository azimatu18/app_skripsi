<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary"><i class="bi bi-boxes me-2"></i>Daftar Pemesanan</h4>
    </div>

    <!-- Cari produk -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle table-hover">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Konsumen</th>
                            <th scope="col">No HP</th>
                            <th scope="col">No Faktur</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemesanan as $no => $data): ?>
                            <tr>
                                <td class="text-center"><?= $no + 1 ?></td>
                                <td><?= $data['konsumen'] ?></td>
                                <td><?= $data['no_hp'] ?></td>
                                <td><?= $data['no_faktur'] ?></td>
                                <td><?= $data['alamat'] ?></td>

                                <td>
                                    <?php
                                    $tipe = $data['status_tipe'];
                                    echo status_pemesanan($tipe);
                                    ?>
                                </td>

                                <td>
                                    <a class="btn btn-sm btn-primary" href="/admin/pemesanan/detail/<?= $data['id'] ?>">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
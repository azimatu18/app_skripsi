<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary">Validasi Dokumen</h4>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle table-hover">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">ID Pemesanan</th>
                    <th scope="col">Nama Konsumen</th>
                    <th scope="col">Jenis Dokumen</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_dokumen as $no => $dokumen): ?>
                    <tr>
                        <td class="text-center"><?= $no + 1 ?></td>
                        <td class="text-center">
                            <strong><?= $dokumen['pemesanan_id'] ?></strong>
                        <td class="text-center"><?= $dokumen['konsumen'] ?></td>
                        <td class="text-center">
                            <?= $dokumen['tipe_dokumen'] ?>
                        </td>
                        <td class="text-center">
                            <?php
                            $tipe = $dokumen['status_dokumen'];
                            echo '<div>' . Status_validasi_dokumen($tipe) . '</div>';

                            if ($tipe == 3 && !empty($dokumen['alasan_penolakan'])):
                            ?>
                                <div class="mt-2 p-2 bg-light border rounded text-danger small">
                                    <strong>Alasan Penolakan:</strong><br>
                                    <?= esc($dokumen['alasan_penolakan']) ?>
                                </div>
                            <?php endif; ?>
                        </td>

                        <td class="text-center"><a href="/admin/validasi_dokumen/detail/<?= $dokumen['id'] ?>" class="btn btn-sm btn-warning mb-1">
                                Detail
                            </a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-primary">Pengajuan Edit Produk
        </h4>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle table-hover">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Status Pengajuan</th>
                    <th scope="col">Tanggal Pengajuan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_produk as $no => $produk): ?>
                    <tr>
                        <td class="text-center"><?= $no + 1 ?></td>
                        <td class="text-center">
                            <strong><?php
                                    $data = json_decode($produk['data_baru'], true);
                                    echo $data['judul'];
                                    ?>
                            </strong>
                        </td>
                        <td class="text-center">
                            <?php
                            $tipe = $produk['status'];
                            echo '<div>' . status_pengajuan($tipe) . '</div>';

                            if ($tipe == 3 && !empty($produk['alasan_penolakan'])):
                            ?>
                                <div class="mt-2 p-2 bg-light border rounded text-danger small">
                                    <strong>Alasan Penolakan:</strong><br>
                                    <?= esc($produk['alasan_penolakan']) ?>
                                </div>
                            <?php endif; ?>
                        </td>

                        <td class="text-center">
                            <?= date('d M Y H:i', strtotime($produk['waktu'])) ?>
                        </td>

                        <td class="text-center"><a href="/admin/produk/pengajuan_edit_produk/detail/<?= $produk['id'] ?>" class="btn btn-sm btn-warning mb-1">
                                 Detail
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
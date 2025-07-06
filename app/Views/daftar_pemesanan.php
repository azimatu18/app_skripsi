<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<!-- <div class="untree_co-section before-footer-section"> -->
<div class="container">
    <h2 class="row mt-5" style="color: #003366;">Daftar Pemesanan</h2>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="site-blocks-table">
                <table class="table table-bordered align-middle table-hover">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">No Faktur</th>
                            <th scope="col">No PO</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pemesanan as $no => $data): ?>
                            <tr>
                                <td class="text-center"><?= $no + 1 ?></td>
                                <td><span><?= $data['no_faktur'] ?></span></td>
                                <td><span><?= $data['no_po'] ?></span></td>
                                <td><span><?= $data['alamat'] ?></span></td>
                                <td>Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></td>

                                <td>
                                    <span style="font-size: medium;">
                                        <?php
                                        $tipe = $data['status_tipe'];
                                        echo status_pemesanan($tipe);
                                        ?>
                                    </span>
                                </td>

                                <td>
                                    <a class="btn btn-sm btn-primary" href="/pemesanan/detail/<?= $data['id'] ?>">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>
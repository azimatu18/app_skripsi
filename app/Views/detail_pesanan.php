<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="d-flex">
                    <h2 class="h3 text-black mb-3">Detail Pesanan</h2>
                </div>
                <div class="p-3 p-lg-5 border bg-white">
                    <div class="d-flex align-items-center gap-2">
                        <h4 class="text-black">Informasi Pemesan</h4>
                        <div class="ms-auto">
                            <span class="alert alert-info fw-bolder">
                                Status:
                                <?php
                                $tipe = $pemesanan['status_tipe'];
                                echo status_pemesanan($tipe);
                                ?>
                            </span>
                        </div>
                        <div>
                            <a href="/pemesanan/cetak/invoice/<?= $pemesanan['id'] ?>" class="btn btn-sm btn-primary w-100">Cetak Invoice</a>
                        </div>
                        <?php if ($pemesanan['status_tipe'] == 4): ?>
                            <div>
                                <a href="#" class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">Konfirmasi barang diterima</a>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <p><strong>Nama:</strong> <?= $pemesanan['konsumen'] ?></p>
                            <p><strong>Alamat:</strong> <?= $pemesanan['alamat'] ?></p>
                            <p><strong>No PO:</strong> <?= $pemesanan['no_po'] ?></p>
                            <p><strong>Email:</strong> <?= $pemesanan['email'] ?></p>
                            <p><strong>No Handphone:</strong> <?= $pemesanan['no_hp'] ?></p>
                            <p><strong>Catatan:</strong> <?= $pemesanan['catatan'] ?: '-' ?></p>
                        </div>
                        <div class="col-md-5">
                            <?php if ($pemesanan['status_tipe'] == '7'): ?>
                                <div class="bg-light mt-3 p-3 rounded">
                                    <h4>Pesanan Sudah selesai</h4>
                                    <p>
                                        Silahkan Unduh berita acara dan faktur penjualan berikut
                                    </p>
                                    <a href="/pemesanan/cetak/berita_acara/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100 mb-2">Berita Acara</a>
                                    <a href="/pemesanan/cetak/faktur_penjualan/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100">Faktur Penjualan</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <h4 class="text-black mt-4">Daftar Pesanan</h4>
                    <table class="table site-block-order-table mb-5">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_belanja = 0; ?>
                            <?php foreach ($detail_pesanan as $item): ?>
                                <?php
                                $harga_diskon = $item['harga'] - ($item['harga'] * $item['diskon'] / 100);
                                $subtotal = $harga_diskon * $item['jumlah']; 
                                ?>
                                <tr>
                                    <td><?= $item['judul'] ?></td>
                                    <td><?= $item['jumlah'] ?></td>
                                    <td>Rp. <?= number_format($item['harga'], 0, '.', '.') ?></td>
                                    <td><?= $item['diskon'] ?> % </td>
                                    <td>Rp. <?= number_format($subtotal, 0, '.', '.') ?></td>
                                </tr>
                                <?php $total_belanja += $subtotal; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-black font-weight-bold"><strong>Total</strong></td>
                                <td class="text-black font-weight-bold"><strong>Rp. <?= number_format($total_belanja, 0, '.', '.') ?></strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex">
                        <div>
                            <h4 class="text-black">Metode Pembayaran</h4>
                            <p>Pembayaran dapat ditransfer melalui:</p>
                            <p><strong>Bank BCA - Ni Ketut Sri Nilowati</strong></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ms-auto">
                                <h4>Upload Bukti Pembayaran DP</h4>
                                <p>Silahkan Upload Bukti Pembayaran DP sebesar 50% (<strong>Rp. <?= number_format($total_belanja / 2, 0, '.', '.') ?></strong>)</p>
                                <form action="/pemesanan/dp/upload" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $pemesanan['id'] ?>">
                                    <input type="file" name="bukti_dp" accept="image/*" onchange="form.submit()">
                                </form>
                                <?php if ($pemesanan['bukti_dp']): ?>
                                    <img class="img-thumbnail mt-5" src="<?= base_url('uploads/bukti_dp/' . $pemesanan['bukti_dp']) ?>" alt="gambar produk" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#modalBuktiDP">
                                <?php endif ?>
                            </div>
                        </div>
                        <?php if ($pemesanan['status_tipe'] >= 5): ?>
                            <div class="col-md-6">
                                <div class="ms-auto">
                                    <h4>Upload Bukti Pelunasan</h4>
                                    <p>Silahkan Upload Bukti Pelunasan sebesar (<strong>Rp. <?= number_format($total_belanja / 2, 0, '.', '.') ?></strong>)</p>
                                    <form action="/pemesanan/lunas/upload" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $pemesanan['id'] ?>">
                                        <input type="file" name="bukti_lunas" accept="image/*" onchange="form.submit()">
                                    </form>

                                    <?php if ($pemesanan['bukti_lunas']): ?>
                                        <img class="img-thumbnail mt-5" src="<?= base_url('uploads/bukti_lunas/' . $pemesanan['bukti_lunas']) ?>" alt="gambar produk" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#modalBuktiLunas">
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <a href="/daftar-pemesanan" class="btn btn-black btn-lg py-3 mt-4">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="konfirmasiModalLabel">Konfrimasi penerimaan barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pemesanan/konfirmasi/<?= $pemesanan['id'] ?>" method="post" onsubmit="return confirm('Apakah anda yakin')">
                    <table class="table table-bordered">
                        <tr>
                            <th>Keterangan</th>
                            <th>Ya</th>
                            <th>Tidak</th>
                        </tr>
                        <tr>
                            <td>Produk berfungsi dengan baik</td>
                            <td>
                                <input type="radio" name="fungsi" value="1" checked>
                            </td>
                            <td>
                                <input type="radio" name="fungsi" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td>Training penggunaan dan perawatan produk dipahami dengan baik</td>
                            <td>
                                <input type="radio" name="training" value="1" checked>
                            </td>
                            <td>
                                <input type="radio" name="training" value="0">
                            </td>
                        </tr>
                    </table>
                    <label>Saran:</label>
                    <textarea name="saran" class="form-control" rows="5">-</textarea>
                    <button class="btn btn-primary w-100 mt-2">Konfirmasi barang</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bukti DP -->
<?php if ($pemesanan['bukti_dp']): ?>
    <div class="modal fade" id="modalBuktiDP" tabindex="-1" aria-labelledby="modalBuktiDPLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBuktiDPLabel">Bukti Pembayaran DP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?= base_url('uploads/bukti_dp/' . $pemesanan['bukti_dp']) ?>" alt="Bukti DP" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Modal Bukti Pelunasan -->
<?php if ($pemesanan['bukti_lunas']): ?>
    <div class="modal fade" id="modalBuktiLunas" tabindex="-1" aria-labelledby="modalBuktiLunasLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBuktiLunasLabel">Bukti Pelunasan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?= base_url('uploads/bukti_lunas/' . $pemesanan['bukti_lunas']) ?>" alt="Bukti Pelunasan" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
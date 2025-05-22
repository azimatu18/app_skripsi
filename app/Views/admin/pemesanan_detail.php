<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="h3 mb-3 text-black">Detail Pesanan</h2>
                <div class="p-3 p-lg-5 border bg-white">

                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="text-black">Informasi Pemesan</h4>
                            <p class="mb-0"><strong>Nama:</strong> <?= $pemesanan['konsumen'] ?></p>
                            <p class="mb-0"><strong>Alamat:</strong> <?= $pemesanan['alamat'] ?></p>
                            <p class="mb-0"><strong>Email:</strong> <?= $pemesanan['email'] ?></p>
                            <p class="mb-0"><strong>No Handphone:</strong> <?= $pemesanan['no_hp'] ?></p>
                            <p class="mb-0"><strong>Catatan:</strong> <?= $pemesanan['catatan'] ?: '-' ?></p>

                        </div>
                        <div class="col-md-5">
                            <div class="alert alert-primary mb-2">
                                <b>Status: </b>
                                <?php
                                $level = App\Models\UserModel::data()['level'];
                                $tipe = $pemesanan['status_tipe'];
                                echo status_pemesanan($tipe);
                                ?>
                            </div>


                            <?php if ($pemesanan['status_tipe'] == '2' && !empty($pemesanan['bukti_dp'])): ?>
                                <?php if ($level == 'pemasaran'): ?>
                                    <div class="bg-primary bg-opacity-25 p-3 rounded">
                                        <h4>Konsumen sudah mengirim bukti pembayaran DP</h4>
                                        <p>
                                            Pastikan Bukti pembayaran yang dikirim sudah sesuai dengan tagihan dan dana dan masuk
                                        </p>
                                        <form action="/admin/pemesanan/konfirmasi" method="post">
                                            <input type="hidden" name="id" value="<?= $pemesanan['id'] ?>">
                                            <button type="submit" class="btn btn-success">Konfirmasi & Ubah ke Diproses</button>
                                        </form>
                                    </div>
                                <?php endif ?>
                            <?php elseif ($pemesanan['status_tipe'] == '3'): ?>
                                <div class="bg-primary bg-opacity-25 p-3 mb-4 rounded">
                                    <h4>Surat Jalan</h4>
                                    <p>
                                        Silahkan Unduh surat jalan dan faktur penjualan berikut
                                    </p>
                                    <a href="/admin/pemesanan/cetak/surat_jalan/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100 mb-2">Surat jalan</a>
                                </div>
                                <div class="bg-primary bg-opacity-25 p-3 rounded">
                                    <h4>Pesanan Sudah Siap Kirim</h4>
                                    <p>
                                        Silahkan tekan tombol dibawah jika pesanan sudah siap dikirim
                                    </p>
                                    <form action="/admin/pemesanan/kirim" method="post">
                                        <input type="hidden" name="id" value="<?= $pemesanan['id'] ?>">
                                        <button class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            <?php elseif ($pemesanan['status_tipe'] == '6' && !empty($pemesanan['bukti_lunas'])): ?>
                                <?php if ($level == 'pemasaran'): ?>

                                    <div class="bg-primary bg-opacity-25 p-3 rounded">
                                        <h4>Konsumen sudah mengirim bukti pembayaran lunas</h4>
                                        <p>
                                            Pastikan Bukti pelunasna yang dikirim sudah sesuai dengan tagihan dan dana yang masuk
                                        </p>
                                        <form action="/admin/pemesanan/lunas" method="post">
                                            <input type="hidden" name="id" value="<?= $pemesanan['id'] ?>">
                                            <button type="submit" class="btn btn-success">Konfirmasi & Ubah ke Selesai</button>
                                        </form>
                                    </div>
                                <?php endif ?>
                            <?php elseif ($pemesanan['status_tipe'] == '7'): ?>
                                <div class="bg-primary bg-opacity-25 p-3 rounded">
                                    <h4>Pesanan Sudah selesai</h4>
                                    <p>
                                        Silahkan Unduh surat jalan dan faktur penjualan berikut
                                    </p>
                                    <a href="/admin/pemesanan/cetak/surat_jalan/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100 mb-2">Surat jalan</a>
                                    <a href="/admin/pemesanan/cetak/faktur_penjualan/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100">Faktur Penjualan</a>
                                    <!-- <a href="/pemesanan/cetak/berita_acara/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100">Berita Acara</a> -->
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
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_belanja = 0; ?>
                            <?php foreach ($detail_pesanan as $item): ?>
                                <?php $subtotal = $item['harga'] * $item['jumlah']; ?>
                                <tr>
                                    <td><?= $item['judul'] ?></td>
                                    <td><?= $item['jumlah'] ?></td>
                                    <td>Rp. <?= number_format($item['harga'], 0, '.', '.') ?></td>
                                    <td>Rp. <?= number_format($subtotal, 0, '.', '.') ?></td>
                                </tr>
                                <?php $total_belanja += $subtotal; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3" class="text-black font-weight-bold"><strong>Total</strong></td>
                                <td class="text-black font-weight-bold"><strong>Rp. <?= number_format($total_belanja, 0, '.', '.') ?></strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-6">
                            <?php if (!empty($pemesanan['bukti_dp'])): ?>
                                <h4 class="text-black mt-4">Bukti Pembayaran DP</h4>
                                <div class="mb-3">
                                    <img src="<?= base_url('uploads/bukti_dp/' . $pemesanan['bukti_dp']) ?>"
                                        alt="Bukti DP"
                                        class="img-fluid img-thumbnail"
                                        style="max-width: 400px; cursor: pointer;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalBuktiDP">
                                </div>
                            <?php else: ?>
                                <div class="alert alert-warning mt-4">Belum ada bukti pembayaran DP yang diunggah.</div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($pemesanan['bukti_lunas'])): ?>
                                <h4 class="text-black mt-4">Bukti Pembayaran lunas</h4>
                                <div class="mb-3">
                                    <img src="<?= base_url('uploads/bukti_lunas/' . $pemesanan['bukti_lunas']) ?>"
                                        alt="Bukti Lunas"
                                        class="img-fluid img-thumbnail"
                                        style="max-width: 400px; cursor: pointer;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalBuktiLunas">
                                </div>
                            <?php else: ?>
                                <div class="alert alert-warning mt-4">Belum ada bukti pelunasan yang diunggah.</div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <a href="/admin/pemesanan" class="btn btn-black btn-lg py-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bukti DP -->
<div class="modal fade" id="modalBuktiDP" tabindex="-1" aria-labelledby="modalBuktiDPLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBuktiDPLabel">Bukti Pembayaran DP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <img src="<?= base_url('uploads/bukti_dp/' . $pemesanan['bukti_dp']) ?>" class="img-fluid" alt="Bukti DP">
            </div>
        </div>
    </div>
</div>

<!-- Modal Bukti Lunas -->
<div class="modal fade" id="modalBuktiLunas" tabindex="-1" aria-labelledby="modalBuktiLunasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBuktiDPLabel">Bukti Pembayaran Lunas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <img src="<?= base_url('uploads/bukti_lunas/' . $pemesanan['bukti_lunas']) ?>" class="img-fluid" alt="Bukti Lunas">
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
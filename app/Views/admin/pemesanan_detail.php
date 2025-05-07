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

                            <?php if ($pemesanan['status_tipe'] == '2' && !empty($pemesanan['bukti_dp'])): ?>
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
                            <?php elseif ($pemesanan['status_tipe'] == '3'): ?>
                                <div class="bg-primary bg-opacity-25 p-3 rounded">
                                    <h4>Pesanan Sudah Siap Kirim</h4>
                                    <p>
                                        Silahkan Masukan NO PO atau SR Jika Konsumen Menyertakan nomor PO sebagai data surat jalan
                                    </p>
                                    <form action="/admin/pemesanan/kirim" method="post">
                                        <input type="hidden" name="id" value="<?= $pemesanan['id'] ?>">
                                        <input type="text" name="no_po" class="form-control mb-3 border-dark" value="<?= $pemesanan->no_po ?>">
                                        <button class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            <?php elseif ($pemesanan['status_tipe'] == '4'): ?>
                                <div class="bg-primary bg-opacity-25 p-3 rounded">
                                    <h4>Pesanan Sudah di Kirim</h4>
                                    <p>
                                        Silahkan Unduh surat jalan dan faktur penjualan berikut
                                    </p>
                                    <a href="/pemesanan/cetak/surat_jalan/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100 mb-2">Surat jalan</a>
                                    <a href="/pemesanan/cetak/faktur_penjualan/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100">Faktur Penjualan</a>
                                    <a href="/pemesanan/cetak/berita_acara/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100">Berita Acara</a>
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

                    <?php if (!empty($pemesanan['bukti_dp'])): ?>
                        <h4 class="text-black mt-4">Bukti Pembayaran DP</h4>
                        <div class="mb-3">
                            <img src="<?= base_url('uploads/bukti_dp/' . $pemesanan['bukti_dp']) ?>" alt="Bukti DP" class="img-fluid img-thumbnail" style="max-width: 400px;">
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning mt-4">Belum ada bukti pembayaran DP yang diunggah.</div>
                    <?php endif; ?>

                    <div class="form-group">
                        <a href="/admin/pemesanan" class="btn btn-black btn-lg py-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
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
                    <div class="d-flex">
                        <h4 class="text-black">Informasi Pemesan</h4>
                        <div class="ms-auto mb-3">
                            <span class="alert alert-info fw-bolder">
                                Status:
                                <?php
                                $tipe = $pemesanan['status_tipe'];
                                switch ($tipe) {
                                    case 1:
                                        echo 'Menunggu Pembayaran';
                                        break;
                                    case 2:
                                        echo 'Menunggu Konfirmasi Pembayaran';
                                        break;
                                    case 3:
                                        echo 'Diproses';
                                        break;
                                    case 4:
                                        echo 'Dikirim';
                                        break;
                                    case 5:
                                        echo 'Selesai';
                                        break;

                                    default:
                                        echo 'Tipe Tidak Sesuai';
                                        break;
                                }
                                ?>
                            </span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <p><strong>Nama:</strong> <?= $pemesanan['konsumen'] ?></p>
                            <p><strong>Alamat:</strong> <?= $pemesanan['alamat'] ?></p>
                            <p><strong>Email:</strong> <?= $pemesanan['email'] ?></p>
                            <p><strong>No Handphone:</strong> <?= $pemesanan['no_hp'] ?></p>
                            <p><strong>Catatan:</strong> <?= $pemesanan['catatan'] ?: '-' ?></p>
                        <!-- </div>
                        <div class="col-md-5">
                            <?php if ($pemesanan['status_tipe'] == '4'): ?>
                                <div class="bg-primary bg-opacity-25 p-3 rounded mt-5">
                                    <h4>Pesanan Sudah di Kirim</h4>
                                    <p>
                                        Silahkan Unduh surat jalan dan faktur penjualan berikut
                                    </p>
                                    <a href="/pemesanan/cetak/surat_jalan/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100 mb-2">Surat jalan</a>
                                    <a href="/pemesanan/cetak/faktur_penjualan/<?= $pemesanan['id'] ?>" class="btn btn-primary w-100">Faktur Penjualan</a>
                                </div>
                            <?php endif; ?>
                        </div> -->
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

                    <div class="d-flex">
                        <div>
                            <h4 class="text-black">Metode Pembayaran</h4>
                            <p>Pembayaran dapat ditransfer melalui:</p>
                            <p><strong>Bank BCA - Ni Ketut Sri Nilowati</strong></p>
                        </div>
                        <div class="ms-auto">
                            <h4>Upload Bukti Pembayaran DP</h4>
                            <p>Silahkan Upload Bukti Pembayaran DP sebesar 50% (<strong>Rp. <?= number_format($total_belanja / 2, 0, '.', '.') ?></strong>)</p>
                            <form action="/pemesanan/dp/upload" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $pemesanan['id'] ?>">
                                <input type="file" name="bukti_dp" accept="image/*" onchange="form.submit()">
                            </form>

                            <img class="img-thumbnail" src="<?= base_url('uploads/bukti_dp/' . $pemesanan['bukti_dp']) ?>" alt="gambar produk">

                        </div>
                    </div>

                    <div class="form-group">
                        <a href="/daftar-pemesanan" class="btn btn-black btn-lg py-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="h3 mb-3 text-black">Detail Pesanan</h2>
                <div class="p-3 p-lg-5 border bg-white">
                    
                    <h4 class="text-black">Informasi Pemesan</h4>
                    <p><strong>Nama:</strong> <?= $pemesanan['konsumen'] ?></p>
                    <p><strong>Alamat:</strong> <?= $pemesanan['alamat'] ?></p>
                    <p><strong>Email:</strong> <?= $pemesanan['email'] ?></p>
                    <p><strong>No Handphone:</strong> <?= $pemesanan['no_hp'] ?></p>
                    <p><strong>Catatan:</strong> <?= $pemesanan['catatan'] ?: '-' ?></p>
                    
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
                    
                    <h4 class="text-black">Metode Pembayaran</h4>
                    <p>Pembayaran dapat ditransfer melalui:</p>
                    <p><strong>Bank BCA - Ni Ketut Sri Nilowati</strong></p>
                    
                    <div class="form-group">
                        <a href="/" class="btn btn-black btn-lg py-3">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

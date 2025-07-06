<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<form action="/pemesanan/submit" method="post">
    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Form Pemesanan</h2>
                    <div class="p-3 p-lg-5 border bg-white">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="konsumen" class="text-black">Nama Konsumen <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="konsumen" name="konsumen" placeholder="Masukan nama konsumen atau perusahan" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="alamat" class="text-black">Alamat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat lengkap" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="no_po" class="text-black">Nomor PO</label>
                                <input type="text" class="form-control" id="no_po" name="no_po" placeholder="Masukan No PO jika ada">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan alamat email" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="col-md-6">
                                <label for="no_hp" class="text-black">No Handphone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan nomor handphone" required oninvalid="this.setCustomValidity('Harap isi bidang ini')" oninput="this.setCustomValidity('')">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="catatan" class="text-black">Catatan Pemesanan</label>
                            <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control" placeholder="Tulis catatan anda disini.."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Pesanan Anda</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Produk</th>
                                        <th>Diskon</th>
                                        <th class="text-center">Total</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_belanja = 0;
                                        foreach ($keranjang_produk as $no => $keranjang):
                                            $harga_diskon = $keranjang['produk']['harga'] - ($keranjang['produk']['harga'] * $keranjang['produk']['diskon'] / 100);
                                            $total =  $harga_diskon * $keranjang['jumlah'];
                                            $total_belanja += $total;
                                        ?>
                                            <tr>
                                                <td><?= $keranjang['produk']['judul'] ?> <strong class="mx-2">x</strong> <?= $keranjang['jumlah'] ?></td>
                                                <td><?= $keranjang['produk']['diskon'] ?> % </td>
                                                <td class="text-center text-black font-weight-bold">Rp. <?= number_format($total, 0, '.', '.') ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <tr>
                                            <td colspan="2" style="color: black; font-weight: bold;">TOTAL PESANAN</td>
                                            <td class="text-center text-black font-weight-bold">
                                                <strong>Rp. <?= number_format($total_belanja, 0, '.', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="border p-3 mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">
                                            Metode Pembayaran
                                        </a></h3>

                                    <div class="collapse" id="collapsebank">
                                        <div class="py-2">
                                            <p class="mb-0">
                                                Pembayaran dapat ditranfer melalui: Bank BCA Ni Ketut Sri Nilowati
                                            </p>
                                            <p>No. Rekening: 5625049137</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-black btn-lg py-3 btn-block">Pesan Sekarang</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</form>
<?= $this->endSection() ?>
<?= $this->extend('components/layoutberanda') ?>
<?= $this->section('konten') ?>

<!-- Start Hero Section -->
<div class="hero">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h2>Keranjang</h2>
        </div>
      </div>
      <div class="col-lg-7">

      </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->



<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th class="product-thumbnail">Gambar</th>
                <th class="product-name">Judul</th>
                <th class="product-price">Harga</th>
                <th class="product-quantity">Jumlah</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total_belanja = 0;
              foreach ($keranjang_produk as $no => $keranjang): ?>
                <tr>
                  <td class="product-thumbnail">
                    <img src="<?= base_url('uploads/gambar/' . $keranjang['produk']['gambar']) ?>" alt="Image" class="img-fluid">
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black"><?= $keranjang['produk']['judul'] ?></h2>
                  </td>
                  <td>Rp. <?= number_format($keranjang['produk']['harga'], 0, '.', '.') ?></td>
                  <td>
                    <form action="/keranjang/ubah/<?= $keranjang['id'] ?>" method="post">
                      <div class="input-group mb-3 d-flex align-items-center" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-black" name="tombol_qty" value="kurang">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center" name="qty" value="<?= $keranjang['jumlah'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" disabled>
                        <div class="input-group-append">
                          <button class="btn btn-outline-black" name="tombol_qty" value="tambah">&plus;</button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td>
                    <?php
                    $total =  $keranjang['produk']['harga'] * $keranjang['jumlah'];
                    $total_belanja += $total;
                    echo 'Rp.' . number_format($total, 0, '.', '.');
                    ?>
                  </td>
                  <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
            <tfoot>
              <th colspan="4">Total</th>
              <th colspan="2">Rp. <?= number_format($total_belanja, 0, '.', '.') ?></th>
            </tfoot>
          </table>
        </div>

        <div class="text-end">
          <button class="btn btn-black btn-lg py-3 btn-block">Checkout</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
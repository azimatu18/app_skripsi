<?= $this->extend('admin/app_layout') ?>
<?= $this->section('konten') ?>

<h2 class="h3 text-black m-2" style="padding-top: 100px!important;">Detail Validasi Dokumen</h2>

<?php if ($dokumen->tipe_dokumen === 'Surat Jalan'): ?>

    <style>
        .surat-container {
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            font-family: "Times New Roman", serif;
            margin: 30px;
        }

        .header,
        .footer {
            width: 100%;
            margin-bottom: 20px;
        }

        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            text-decoration: underline;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: center;
        }

        .note {
            margin-top: 10px;
            font-size: 14px;
        }

        .signatures {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
        }

        .signature-box {
            width: 45%;
            text-align: center;
        }

        .info {
            font-size: 14px;
        }

        .perhatian {
            font-size: 13px;
            margin-top: 10px;
        }

        .logo {
            width: 100px;
            margin-top: 10px;
        }
    </style>

    <div class="surat-container">

        <div class="header">
            <strong>CV. GEDRIAN INTIMED ABADI</strong><br>
            <span class="info">Email: gedrianintimedabadi@gmail.com</span><br><br>
            <hr>
            <table width='100%'>
                <tr>
                    <td>
                        Kepada Yth: <strong><?= $pemesanan['konsumen'] ?></strong><br>
                        Di <br>
                        <?= $pemesanan['alamat'] ?>
                    </td>
                    <td>
                        <div class="title">SURAT JALAN</div>
                    </td>
                </tr>
            </table>
        </div>

        <table class="table">
            <tr>
                <td><strong>No PO</strong>: <?= $pemesanan['no_po'] ?></td>
                <td><strong>Tanggal Pengiriman</strong>:
                    <?php
                    if (!function_exists('bulan_indonesia')) {
                        function bulan_indonesia($tanggal)
                        {
                            $bulan = [
                                'January'   => 'Januari',
                                'February'  => 'Februari',
                                'March'     => 'Maret',
                                'April'     => 'April',
                                'May'       => 'Mei',
                                'June'      => 'Juni',
                                'July'      => 'Juli',
                                'August'    => 'Agustus',
                                'September' => 'September',
                                'October'   => 'Oktober',
                                'November'  => 'November',
                                'December'  => 'Desember',
                            ];

                            $tanggal_angka = date('d', strtotime($tanggal));    // Ambil tanggal (01–31)
                            $bulanInggris = date('F', strtotime($tanggal));
                            $tahun = date('Y', strtotime($tanggal));
                            return $tanggal_angka . ' ' . $bulan[$bulanInggris] . ' ' . $tahun;
                        }
                    }

                    // Contoh penggunaan:
                    echo bulan_indonesia(date('Y-m-d')); // Misal hasil: Mei 2025
                    ?>
                </td>
            </tr>
            <tr>
                <td><strong>No Faktur</strong>: <?= $pemesanan['no_faktur'] ?></td>
                <td><strong>No Surat Jalan</strong>: <?= $pemesanan['no_surat_jalan'] ?></td>
            </tr>
        </table>

        <table class="table">
            <tr>
                <th>NO</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Keterangan</th>
            </tr>
            <?php foreach ($produk as $no => $data): ?>
                <tr>
                    <td><?= $no + 1 ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['jumlah'] ?></td>
                    <td>Unit</td>
                    <td>-</td>
                </tr>
            <?php endforeach ?>
        </table>

        <div class="note">Catatan:</div>

        <div class="perhatian">
            <strong>PERHATIAN:</strong><br>
            1. Surat jalan ini merupakan bukti resmi penerimaan barang<br>
            2. Surat jalan ini bukan bukti penjualan<br>
            3. Surat jalan ini akan dilengkapi faktur sebagai bukti penjualan
        </div>

        <div class="note">
            <strong>BARANG SUDAH DITERIMA DALAM KEADAAN BAIK DAN CUKUP</strong> oleh:<br>
            (Tanda tangan dan cap perusahaan)
        </div>

        <div class="signatures">
            <div class="signature-box">
                Penerima/Pembeli<br><br><br><br>
                ( <?= $pemesanan['konsumen'] ?> )
            </div>
            <div class="signature-box">
                Pengirim/Penjual<br>
                <img src="/homepage/images/logo_cap_gia.png" alt="Logo" class="logo"><br>
                ( CV Gedrian Intimed Abadi )
            </div>
        </div>
    </div>

<?php elseif ($dokumen->tipe_dokumen === 'Faktur Penjualan'): ?>
    <style>
        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 30px;
        }

        .surat-container {
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            font-family: "Times New Roman", serif;
            margin: 30px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        .company-info {
            width: 45%;
            line-height: 1.5;
        }

        .company-info b {
            color: darkblue;
        }

        .details {
            padding-left: 300px;
            display: flex;
            justify-content: space-between;
            /* margin-top: 10px; */
            font-size: 14px;
            width: 45%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
            vertical-align: top;
        }

        .left {
            text-align: left;
        }

        .note {
            margin-top: 10px;
            font-size: 14px;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            font-size: 14px;
        }

        .signature-box {
            text-align: center;
            width: 40%;
        }

        .logo {
            margin-top: 10px;
            width: 100px;
        }
    </style>

    <div class="surat-container">

        <div class="title">FAKTUR PENJUALAN</div>

        <div class="header-container">
            <div class="company-info">
                <b>CV. GEDRIAN INTIMED ABADI</b><br>
                Jl. Palapa II<br>
                Metro Timur Kota Metro<br>
                <a href="mailto:gedrianintimedabadi@gmail.com">gedrianintimedabadi@gmail.com</a>
            </div>
            <div class="details">
                <div>
                    <strong>Kepada :</strong> <?= $pemesanan['konsumen'] ?><br>
                    <strong>No. PO :</strong> <?= $pemesanan['no_po'] ?><br>
                    <strong>Alamat :</strong> <?= $pemesanan['alamat'] ?><br>
                    <strong>No. Faktur :</strong> <?= $pemesanan['no_faktur'] ?><br>
                </div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($produk as $no => $data):
                    $total += $data['jumlah'] * $data['harga'];
                ?>
                    <tr>
                        <td><?= $no + 1 ?></td>
                        <td class="left">
                            <?= $data['judul'] ?>
                        </td>
                        <td><?= $data['jumlah'] ?></td>
                        <td>Unit</td>
                        <td>Rp. <?= number_format($data['harga'], 0, '.', '.') ?></td>
                        <td>Rp. <?= number_format($data['jumlah'] * $data['harga'], 0, '.', '.') ?> </td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td colspan="5" class="left"><strong>Terbilang:</strong>
                        <?php
                        if (!function_exists('terbilang')) {
                            function terbilang($angka)
                            {
                                $angka = abs($angka);
                                $huruf = [
                                    "",
                                    "Satu",
                                    "Dua",
                                    "Tiga",
                                    "Empat",
                                    "Lima",
                                    "Enam",
                                    "Tujuh",
                                    "Delapan",
                                    "Sembilan",
                                    "Sepuluh",
                                    "Sebelas"
                                ];
                                $temp = "";

                                if ($angka < 12) {
                                    $temp = " " . $huruf[$angka];
                                } else if ($angka < 20) {
                                    $temp = terbilang($angka - 10) . " Belas";
                                } else if ($angka < 100) {
                                    $temp = terbilang(floor($angka / 10)) . " Puluh" . terbilang($angka % 10);
                                } else if ($angka < 200) {
                                    $temp = " Seratus" . terbilang($angka - 100);
                                } else if ($angka < 1000) {
                                    $temp = terbilang(floor($angka / 100)) . " Ratus" . terbilang($angka % 100);
                                } else if ($angka < 2000) {
                                    $temp = " Seribu" . terbilang($angka - 1000);
                                } else if ($angka < 1000000) {
                                    $temp = terbilang(floor($angka / 1000)) . " Ribu" . terbilang($angka % 1000);
                                } else if ($angka < 1000000000) {
                                    $temp = terbilang(floor($angka / 1000000)) . " Juta" . terbilang($angka % 1000000);
                                } else if ($angka < 1000000000000) {
                                    $temp = terbilang(floor($angka / 1000000000)) . " Miliar" . terbilang(fmod($angka, 1000000000));
                                } else {
                                    $temp = "Angka terlalu besar";
                                }

                                return $temp;
                            }
                        }

                        echo terbilang($total);
                        ?>

                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="5" class="left">Sub Total</td>
                    <td>Rp. <?= number_format($total, 0, '.', '.') ?></td>
                </tr>
                <tr>
                    <td colspan="5" class="left">PPn</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td colspan="5" class="left"><strong>Grand Total</strong></td>
                    <td>Rp. <?= number_format($total, 0, '.', '.') ?></td>
                </tr>
            </tbody>
        </table>

        <div class="note">
            Pembayaran dapat di transfer Melalui:<br>
            Bank BCA<br>
            Ni Ketut Sri Nilowati<br>
            Acc. 5625049137
        </div>

        <div class="signatures">
            <div class="signature-box">
                <br>Penerima<br><br><br><br>
                ( <?= $pemesanan['konsumen'] ?> )
            </div>
            <div class="signature-box">
                Metro,
                <?php
                if (!function_exists('bulan_indonesia')) {
                    function bulan_indonesia($tanggal)
                    {
                        $bulan = [
                            'January'   => 'Januari',
                            'February'  => 'Februari',
                            'March'     => 'Maret',
                            'April'     => 'April',
                            'May'       => 'Mei',
                            'June'      => 'Juni',
                            'July'      => 'Juli',
                            'August'    => 'Agustus',
                            'September' => 'September',
                            'October'   => 'Oktober',
                            'November'  => 'November',
                            'December'  => 'Desember',
                        ];

                        $bulanInggris = date('F', strtotime($tanggal));
                        $tahun = date('Y', strtotime($tanggal));
                        return $bulan[$bulanInggris] . ' ' . $tahun;
                    }
                }

                // Contoh penggunaan:
                echo bulan_indonesia(date('Y-m-d')); // Misal hasil: Mei 2025
                ?>
                <br>
                Pengirim<br>
                <img src="/homepage/images/logo_cap_gia.png" alt="Logo" class="logo"><br>
                ( CV Gedrian Intimed Abadi )
            </div>
        </div>

    </div>
<?php elseif ($dokumen->tipe_dokumen === 'Berita Acara'): ?>
    <style>
        .surat-container {
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
            font-family: "Times New Roman", serif;
            margin: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        .no-border td {
            border: none;
            padding: 4px;
        }

        .checkbox {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 1px solid #000;
            margin-right: 6px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            font-size: 14px;
        }

        .signature-box {
            text-align: center;
            width: 40%;
        }

        .saran-box {
            border: 1px solid #000;
            height: 100px;
            padding: 10px;
            margin-top: 10px;
        }

        .header {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .logo {
            width: 120px;
            display: block;
            margin-bottom: 5px;
        }

        .company-info {
            font-size: 13px;
            text-align: left;
            line-height: 1.4;
            margin-top: 20px;
        }
    </style>
    <div class="surat-container">
        <table class="no-border">
            <tr>
                <td style="text-align: left;">
                    <img src="/homepage/images/logocv.png" alt="Logo" class="logo">
                    <strong>GEDRIAN INTIMED ABADI</strong><br>
                    <div class="company-info">
                        Alamat: Jl. Palapa II Gang Venus Metro Timur, Kota Metro.<br>
                        Tlp: +62 856-0945-2822 / +62 821-7631-6500<br>
                        Email: gedrianintimedabadi@gmail.com
                    </div>
                </td>
            </tr>
        </table>

        <div style="text-align: center;">
            <h3 class="header" style="display: inline-block; border-bottom: 2px solid black; padding-bottom: 5px; margin: 0;">
                BERITA ACARA SERAH TERIMA
            </h3>
        </div>

        <p>Pada hari ini tanggal
            <?php
            if (!function_exists('bulan_indonesia')) {
                function bulan_indonesia($tanggal)
                {
                    $bulan = [
                        'January'   => 'Januari',
                        'February'  => 'Februari',
                        'March'     => 'Maret',
                        'April'     => 'April',
                        'May'       => 'Mei',
                        'June'      => 'Juni',
                        'July'      => 'Juli',
                        'August'    => 'Agustus',
                        'September' => 'September',
                        'October'   => 'Oktober',
                        'November'  => 'November',
                        'December'  => 'Desember',
                    ];

                    $tanggal_angka = date('d', strtotime($tanggal));    // Ambil tanggal (01–31)
                    $bulanInggris = date('F', strtotime($tanggal));
                    $tahun = date('Y', strtotime($tanggal));
                    return $tanggal_angka . ' ' . $bulan[$bulanInggris] . ' ' . $tahun;
                }
            }

            // Contoh penggunaan:
            echo bulan_indonesia(date('Y-m-d')); // Misal hasil: Mei 2025
            ?>
            telah dilakukan kegiatan:</p>
        <table class="no-border">
            <tr>
                <td>
                    <label style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox" checked>
                        <span>Install Produk</span>
                    </label>
                </td>
                <td>
                    <label style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox">
                        <span>Uji Fungsi dan Training</span>
                    </label>
                </td>
                <td>
                    <label style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox">
                        <span>Perbaikan Produk</span>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox">
                        <span>Pengecekan Produk</span>
                    </label>
                </td>
                <td>
                    <label style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox">
                        <span>Kunjungan / Maintenance</span>
                    </label>
                </td>
                <td>
                    <label style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox" checked>
                        <span>Pengadaan Produk</span>
                    </label>
                </td>
            </tr>
        </table>


        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Nama Produk</th>
                    <th style="text-align: center;">Type</th>
                    <th style="text-align: center;">Merek</th>
                    <th style="text-align: center;">QTY</th>
                    <th style="text-align: center;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $no => $data): ?>
                    <tr>
                        <td style="text-align: center;"><?= $no + 1 ?></td>
                        <td><?= $data['judul'] ?></td>
                        <td><?= $data['tipe'] ?></td>
                        <td><?= $data['merek'] ?></td>
                        <td style="text-align: center;"><?= $data['jumlah'] ?></td>
                        <td style="text-align: center;">-</td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>

        <p>Nama Rumah Sakit: <?= $pemesanan['konsumen'] ?></p>
        <p>Alamat: <?= $pemesanan['alamat'] ?></p>

        <div class="section-title">Dengan hasil sebagai berikut:</div>
        <table class="table table-bordered">
            <tr>
                <td>1. Produk berfungsi dengan baik</td>
                <td>
                    <input type="radio" name="fungsi" value="1" <?= $penerimaan['fungsi'] ? 'checked' : '' ?>> Ya
                </td>
                <td>
                    <input type="radio" name="fungsi" value="0" <?= $penerimaan['fungsi'] ? '' : 'checked' ?>> Tidak
                </td>
            </tr>
            <tr>
                <td>2. Training penggunaan dan perawatan produk dipahami dengan baik</td>
                <td>
                    <input type="radio" name="training" value="1" <?= $penerimaan['training'] ? 'checked' : '' ?>> Ya
                </td>
                <td>
                    <input type="radio" name="training" value="0" <?= $penerimaan['training'] ? '' : 'checked' ?>> Tidak
                </td>
            </tr>
        </table>

        <div class="section-title">Saran:</div>
        <div class="saran-box"><?= $penerimaan['saran'] ?></div>


        <div class="signatures">
            <div class="signature-box">
                <br>CV. Gedrian Intimed Abadi<br><br>
                <img src="/homepage/images/logo_cap_gia.png" alt="Logo" class="logo" style="margin-left: 160px;"><br>
            </div>
            <div class="signature-box">
                <br>
                Konsumen<br><br><br><br><br>
                <?= $pemesanan['konsumen'] ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>Dokumen tidak dikenali.</p>

<?php endif; ?>

<?php if ($dokumen['status_dokumen'] != 2): ?>
    <div class="mb-4">
        <div class="d-flex align-items-end gap-3 flex-wrap m-4">

            <a href="/admin/validasi_dokumen" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
            <!-- Form Setujui Validasi Dokumen -->
            <form action="<?= base_url('admin/validasi_dokumen/diSetujui/' . $dokumen['id']) ?>" method="post" class="ms-auto">
                <?= csrf_field() ?>
                <button type="submit" class="btn-success px-4">
                    <i class="bi bi-check2-circle me-1"></i> Setujui
                </button>
            </form>
        </div>
    </div>
<?php endif; ?>



<?= $this->endSection() ?>
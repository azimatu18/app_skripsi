<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Berita Acara Serah Terima</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            font-size: 14px;
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
</head>

<body onload="window.print()">
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
            <img src="/homepage/images/logo_cap_gia.png" alt="Logo" class="logo" style="margin-left: 60px;"><br>
        </div>
        <div class="signature-box">
            <br>
            Konsumen<br><br><br><br><br><br>
            <?= $pemesanan['konsumen'] ?>
        </div>
    </div>


</body>

</html>
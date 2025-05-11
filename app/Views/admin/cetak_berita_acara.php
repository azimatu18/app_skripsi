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

        .signature {
            margin-top: 40px;
        }

        .signature td {
            border: none;
            text-align: center;
            padding-top: 40px;
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

    <p>Pada hari ini tanggal __________________ telah dilakukan kegiatan:</p>
    <table class="no-border">
        <tr>
            <td>
                <div class="checkbox"></div> Install Produk
            </td>
            <td>
                <div class="checkbox"></div> Uji Fungsi dan Training
            </td>
            <td>
                <div class="checkbox"></div> Perbaikan Produk
            </td>
        </tr>
        <tr>
            <td>
                <div class="checkbox"></div> Pengecekan Produk
            </td>
            <td>
                <div class="checkbox"></div> Kunjungan / Maintenance
            </td>
            <td>
                <div class="checkbox"></div> ....................................................
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
                    <td></td>
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
                <input type="radio" name="fungsi" value="1" <?= $penerimaan['fungsi'] ? 'checked' : '' ?>> YA
            </td>
            <td>
                <input type="radio" name="fungsi" value="0" <?= $penerimaan['fungsi'] ? '' : 'checked' ?>> TidAK
            </td>
        </tr>
        <tr>
            <td>2. Training penggunaan dan perawatan produk dipahami dengan baik</td>
            <td>
                <input type="radio" name="training" value="1" <?= $penerimaan['training'] ? 'checked' : '' ?>> YA
            </td>
            <td>
                <input type="radio" name="training" value="0" <?= $penerimaan['training'] ? '' : 'checked' ?>> TIDAK
            </td>
        </tr>
    </table>

    <div class="section-title">Saran:</div>
    <div class="saran-box"><?= $penerimaan['saran'] ?></div>

    <table class="signature" width="100%">
        <tr>
            <td>CV. GEDRIAN INTIMED ABADI</td>
            <td>Customer/User</td>
        </tr>
        <tr>
            <td>______________________________</td>
            <td><?= $pemesanan['konsumen'] ?>
                <div>Jabatan:</div>
        </td>
        </tr>
    </table>

</body>

</html>
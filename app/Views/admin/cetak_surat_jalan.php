<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Jalan</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
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
    </style>
</head>

<body onload="window.print()">

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
            <td><strong>Tanggal Pengiriman</strong>: <?= $pemesanan['tanggal_dikirim'] ?></td>
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

    <div class="note">
        Catatan:
    </div>

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
            Penerima/Pembeli<br><br><br><br><br>
            ( <?= $pemesanan['konsumen'] ?> )
        </div>
        <div class="signature-box">
            Pengirim/Penjual<br><br>
            <img src="/homepage/images/logo_cap_gia.png" alt="Logo" class="logo"><br>
            ( CV Gedrian Intimed Abadi )
        </div>
    </div>

</body>

</html>
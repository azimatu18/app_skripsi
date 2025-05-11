<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .logo {
            width: 100px;
        }

        .company-info {
            text-align: right;
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #888;
            padding: 4px 6px;
        }

        th {
            background-color: #007f4e;
            color: white;
            text-align: center;
        }

        td {
            vertical-align: top;
        }

        .text-right {
            text-align: right;
        }

        .no-border {
            border: none;
        }

        .bold {
            font-weight: bold;
        }

        .section-title {
            font-weight: bold;
            margin-top: 40px;
        }

        .footer {
            margin-top: 60px;
        }

        .signature {
            margin-top: 80px;
            text-align: right;
        }

        .payment-info {
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="header">
        <div>
            <img src="/homepage/images/logocv.png" alt="Logo" class="logo"><br>
            <strong>GEDRIAN INTIMED ABADI</strong><br>
        </div>
        <div class="company-info">
            <strong>CV. Gedrian Intimed Abadi</strong><br>
            Jl. Palapa 2 Gang Venus Metro Timur Kota Metro<br>
            Email: gedrianintimedabadi@gmail.com
        </div>
    </div>

    <h2>Invoice</h2>

    <table>
        <tr>
            <td><strong>Tagihan Kepada</strong><br><span class="bold"><?= $pemesanan['konsumen'] ?></span></td>
            <td><strong>Tgl. Jatuh Tempo</strong><br>17/09/2024</td>
            <td><strong>Referensi</strong><br>GIA/INV/00015</td>
            <td><strong>Tanggal</strong><br>17/09/2024</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi Item</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Diskon</th>
                <th>Pajak</th>
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
                    <td class="text-center"><?= $no + 1 ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['jumlah'] ?> Unit</td>
                    <td>Rp. <?= number_format($data['harga'], 0, '.', '.') ?></td>
                    <td>30%</td>
                    <td>-</td>
                    <td class="text-right">Rp. <?= number_format($data['jumlah'] * $data['harga'], 0, '.', '.') ?></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <table>
        <tr>
            <td colspan="4" class="no-border text-right"><strong>Subtotal</strong></td>
            <td class="text-right">Rp. 328.320.000</td>
        </tr>
        <tr>
            <td colspan="4" class="no-border text-right"><strong>Total Diskon</strong></td>
            <td class="text-right">Rp. 114.696.000</td>
        </tr>
        <tr>
            <td colspan="4" class="no-border text-right"><strong>Total</strong></td>
            <td class="text-right">Rp. 267.624.000</td>
        </tr>
        <tr>
            <td colspan="4" class="no-border text-right"><strong>DP 50%</strong></td>
            <td class="text-right">Rp. 133.812.000</td>
        </tr>
    </table>

    <div class="signature">
        <p>CV. Gedrian Intimed Abadi</p>
        <br><br><br>
        <p><strong>Ni Ketut Sri Nilowati</strong></p>
    </div>

    <div class="payment-info">
        <p><strong>Pembayaran DP 50% (Down Payment) Melalui:</strong></p>
        <p>
            Nama Bank : BCA<br>
            Atas Nama : Ni Ketut Srinilowati<br>
            No. Rekening : 5625049137
        </p>
    </div>

</body>

</html>
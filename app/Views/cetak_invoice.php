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
            <td><strong>Referensi</strong><br>GIA/INV/00020</td>
            <td><strong>Tanggal</strong><br>
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
    </table>

    <table>
        <thead>
            <tr style="background-color: #2e7d32; color: white;">
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
                $diskon = $data['diskon'] / 100;
                $harga_diskon = $data['harga'] - ($data['harga'] * $diskon);
                $total_diskon = $data['harga'] * $data['jumlah'] * $diskon;
                $sub_total = $data['harga'] * $data['jumlah'];
                $total =  $harga_diskon * $data['jumlah'];
            ?>
                <tr>
                    <td style="text-align: center; vertical-align: middle;"><?= $no + 1 ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?= $data['judul'] ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?= $data['jumlah'] ?> Unit</td>
                    <td style="text-align: center; vertical-align: middle;">Rp. <?= number_format($data['harga'], 0, '.', '.') ?></td>
                    <td style="text-align: center; vertical-align: middle;"><?= $data['diskon'] ?> %</td>
                    <td style="text-align: center; vertical-align: middle;">-</td>
                    <td class="text-right">Rp. <?= number_format($total, 0, '.', '.') ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <table>
        <tr>
            <td colspan="4" class="no-border text-right"><strong>Subtotal</strong></td>
            <td class="text-right">Rp. <?= number_format($sub_total, 0, '.', '.') ?></td>
        </tr>
        <tr>
            <td colspan="4" class="no-border text-right"><strong>Total Diskon</strong></td>
            <td class="text-right">Rp.<?= number_format($total_diskon, 0, '.', '.') ?></td>
        </tr>
        <tr>
            <td colspan="4" class="no-border text-right"><strong>Total</strong></td>
            <td class="text-right">Rp. <?= number_format($total, 0, '.', '.') ?></td>
        </tr>
        <tr>
            <td colspan="4" class="no-border text-right"><strong>DP 50%</strong></td>
            <td class="text-right">Rp. <?= number_format($total / 2, 0, '.', '.') ?></td>
        </tr>
    </table>

    <div class="signature">
        <p>CV. Gedrian Intimed Abadi</p>
        <img src="/homepage/images/logo_cap_gia.png" alt="Logo" class="logo"><br>
        <p class="text-center"><strong>Ni Ketut Srinilowati</strong></p>
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
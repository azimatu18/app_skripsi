<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Faktur Penjualan</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
        }

        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            text-decoration: underline;
        }

        .company-info {
            margin-bottom: 10px;
        }

        .company-info b {
            color: darkblue;
        }

        .details {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 14px;
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
</head>

<body onload="window.print()">

    <div class="title">FAKTUR PENJUALAN</div>

    <div class="company-info">
        <b>CV. GEDRIAN INTIMED ABADI</b><br>
        Jl. Palapa II<br>
        Metro Timur Kota Metro<br>
        <a href="mailto:gedrianintimedabadi@gmail.com">gedrianintimedabadi@gmail.com</a>
    </div>

    <div class="details">
        <div>
            <strong>Kepada:</strong> <?= $pemesanan['konsumen'] ?><br>
            <strong>No PO /SP:</strong> <?= $pemesanan['no_po'] ?><br>
            <strong>Alamat:</strong> <?= $pemesanan['alamat'] ?>
        </div>
        <div>
            <strong>NO Faktur:</strong> <?= $pemesanan['no_faktur'] ?>
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
                    <td>Rp.<?= $data['harga'] ?></td>
                    <td>Rp <?= $data['jumlah'] * $data['harga'] ?></td>
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
                <td>Rp <?= $total ?></td>
            </tr>
            <tr>
                <td colspan="5" class="left">PPn</td>
                <td>-</td>
            </tr>
            <tr>
                <td colspan="5" class="left"><strong>Grand Total</strong></td>
                <td>Rp <?= $total ?></td>
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
            Penerima<br><br><br><br>
            ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
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
            Pengirim<br><br><br>
            ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
        </div>
    </div>

</body>

</html>
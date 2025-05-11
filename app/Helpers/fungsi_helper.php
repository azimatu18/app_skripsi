<?php

if (!function_exists('status_pemesanan')) {
    function status_pemesanan(int $kode): string
    {
        $status = [
            0 => 'Status tidak diketahui',
            1 => 'Menunggu Pembayaran DP',
            2 => 'Menunggu Konfirmasi Pembayaran DP',
            3 => 'Diproses',
            4 => 'Dikirim',
            5 => 'Menunggu Pelunasan',
            6 => 'Menunggu Konfirmasi Pelunasan',
            7 => 'Selesai',
        ];

        return $status[$kode] ?? 'Status Tidak Diketahui';
    }
}

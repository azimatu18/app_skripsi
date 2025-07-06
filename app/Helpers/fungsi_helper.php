<?php


if (!function_exists('status_pemesanan')) {
    function status_pemesanan(int $kode): string
    {
        $status = [
            1 => ['label' => 'Menunggu Pembayaran DP', 'class' => 'bg-secondary'],
            2 => ['label' => 'Menunggu Konfirmasi Pembayaran DP', 'class' => 'bg-warning text-dark'],
            3 => ['label' => 'Diproses', 'class' => 'bg-primary'],
            4 => ['label' => 'Dikirim', 'class' => 'bg-info'],
            5 => ['label' => 'Menunggu Pelunasan', 'class' => 'bg-warning'],
            6 => ['label' => 'Menunggu Konfirmasi Pelunasan', 'class' => 'bg-warning text-dark'],
            7 => ['label' => 'Selesai', 'class' => 'bg-success'],
        ];

        $data = $status[$kode] ?? ['label' => 'Status Tidak Diketahui', 'class' => 'bg-danger'];

        return '<span class="badge ' . $data['class'] . '">' . $data['label'] . '</span>';
    }
}


if (!function_exists('status_pengajuan')) {
    function status_pengajuan(int $kode): string
    {
        $status = [
            1 => ['label' => 'Menunggu Validasi', 'class' => 'badge bg-warning text-dark'],
            2 => ['label' => 'Disetujui',         'class' => 'badge bg-success'],
            3 => ['label' => 'Ditolak',           'class' => 'badge bg-danger-jreng'],
        ];

        if (isset($status[$kode])) {
            return '<span class="' . $status[$kode]['class'] . '">' . $status[$kode]['label'] . '</span>';
        } else {
            return '<span class="badge bg-secondary">Status Tidak Diketahui</span>';
        }
    }
}


if (!function_exists('status_validasi_dokumen')) {
    function Status_validasi_dokumen(int $kode): string
    {
        $status = [
            1 => ['label' => 'Menunggu Validasi', 'class' => 'badge bg-warning text-dark'],
            2 => ['label' => 'Disetujui',         'class' => 'badge bg-success'],
            3 => ['label' => 'Ditolak',           'class' => 'badge bg-danger-jreng'],
        ];

        if (isset($status[$kode])) {
            return '<span class="' . $status[$kode]['class'] . '">' . $status[$kode]['label'] . '</span>';
        } else {
            return '<span class="badge bg-secondary">Status Tidak Diketahui</span>';
        }
    }
}

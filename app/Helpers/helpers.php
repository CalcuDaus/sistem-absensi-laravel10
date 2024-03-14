<?php

use App\Models\Notifikasi;

if (!function_exists('namedAbsen')) {
    function namedAbsen($param)
    {
        switch ($param) {
            case 'i':
                return 'izin';
                break;
            case 'a':
                return 'alpha';
                break;
            case 's':
                return 'sakit';
                break;
            default:
                return null;
                break;
        }
    }
}

if (!function_exists('filterKategori')) {
    function filterKategori($param)
    {
        switch ($param) {
            case 'i':
                return 1;
                break;
            case 'a':
                return 3;
                break;
            case 's':
                return 2;
                break;
            default:
                return null;
                break;
        }
    }
}
if (!function_exists('getNotif')) {
    function getNotif($param)
    {
        $dt_notifikasi = Notifikasi::leftJoin('notifikasi_bacas', 'notifikasis.id', '=', 'notifikasi_bacas.notifikasi_id')
            ->where('notif_instruktur_id', '=', $param)
            ->where('notifikasi_bacas.dibaca', '=', null)
            ->select('*', 'notifikasis.created_at as waktu_notif')
            ->get();

        return $dt_notifikasi;
    }
}
if (!function_exists('getNotifCount')) {
    function getNotifCount($param)
    {
        $dt_notifikasi = Notifikasi::leftJoin('notifikasi_bacas', 'notifikasis.id', '=', 'notifikasi_bacas.notifikasi_id')
            ->where('notif_instruktur_id', '=', $param)
            ->where('notifikasi_bacas.dibaca', '=', null)
            ->select('*', 'notifikasis.created_at as waktu_notif')
            ->get()
            ->count();

        return $dt_notifikasi;
    }
}

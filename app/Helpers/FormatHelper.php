<?php

namespace App\Helper;

use App\Models\PerkaraHukum;

class FormatHelper
{
    public static function uploadFile($file, $fileName, $folder)
    {
        $size = $file->getSize();
        $ext = '.' . $file->getClientOriginalExtension();

        $fixedFileName = preg_replace("/[^a-zA-Z0-9.]/", "", $fileName);

        $destinationPath = public_path() . $folder;
        $uploadedname = $fixedFileName . $ext;

        $file->move($destinationPath, $uploadedname);
        $destinationPath = env('APP_URL') . $folder;

        return $destinationPath . $uploadedname;
    }

    public static function formatDate($date)
    {
        if (!$date) return '-';
        $date = date_format(date_create($date), 'Y-m-d');
        // dd($date);
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $date);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public static function getStatusPerkara(PerkaraHukum $perkara)
    {
        $status = "";

        if (!$perkara->approved) $status = "Menunggu Approval Admin";
        else if (!$perkara->es4) $status = "Menunggu Approval Eselon IV";
        else if (!$perkara->es3) $status = "Menunggu Approval Eselon III";
        else if (!$perkara->es2) $status = "Menunggu Approval Eselon II";
        else if ($perkara->finished) $status = "Selesai";
        else $status = "Dalam Proses";

        return $status;
    }
}

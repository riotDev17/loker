<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('tgl_indo')) {

  function tgl_indo($tgl)
  {
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
  }

  function getBulan($bln)
  {
    switch ($bln) {
      case 1:
        return "Jan";
        break;
      case 2:
        return "Feb";
        break;
      case 3:
        return "Mar";
        break;
      case 4:
        return "Apr";
        break;
      case 5:
        return "Mei";
        break;
      case 6:
        return "Juni";
        break;
      case 7:
        return "Juli";
        break;
      case 8:
        return "Agustus";
        break;
      case 9:
        return "Sep";
        break;
      case 10:
        return "Okt";
        break;
      case 11:
        return "Nov";
        break;
      case 12:
        return "Des";
        break;
    }
  }

  function tgl_str($date)
  {
    $exp = explode('-', $date);
    if (count($exp) == 3) {
      $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
    }
    return $date;
  }

  function nama_hari()
  {
    $seminggu = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $hari = date("w");
    $hari_ini = $seminggu[$hari];
    return $hari_ini;
  }
  function time_since($original)
  {
    date_default_timezone_set('Asia/Jakarta');

    $now = time();
    $timestamp = strtotime($original);
    $diff = $now - $timestamp;

    $minute = 60;
    $hour = $minute * 60;
    $day = $hour * 24;
    $month = $day * 30;
    $year = $day * 365;

    if ($diff > $year) {
      $result = floor($diff / $year);
      return $result == 1 ? '1 tahun yang lalu' : $result . ' tahun yang lalu';
    } elseif ($diff > $month) {
      $result = floor($diff / $month);
      return $result == 1 ? '1 bulan yang lalu' : $result . ' bulan yang lalu';
    } elseif ($diff > $day) {
      $result = floor($diff / $day);
      return $result == 1 ? '1 hari yang lalu' : $result . ' hari yang lalu';
    } elseif ($diff > $hour) {
      $result = floor($diff / $hour);
      return $result == 1 ? '1 jam yang lalu' : $result . ' jam yang lalu';
    } elseif ($diff > $minute) {
      $result = floor($diff / $minute);
      return $result == 1 ? '1 menit yang lalu' : $result . ' menit yang lalu';
    } else {
      return 'Baru saja';
    }
  }

 
}

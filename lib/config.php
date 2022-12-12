<?php
// Membuat variabel, ubah sesuai dengan nama host dan database pada hosting
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_krs';
$folder = 'krs';

//Menggunakan objek mysqli untuk membuat koneksi dan menyimpanya dalam variabel $mysqli
$mysqli = new mysqli($host, $user, $pass, $db);

//Menentukan timezone //
date_default_timezone_set('Asia/Jakarta');

//Membuat variabel yang menyimpan nilai waktu //
$nama_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
$hari = date('w');
$hari_ini = $nama_hari[$hari];

$tgl_sekarang = date('d');
$bln_sekarang = date('m');
$thn_sekarang = date('Y');

$tanggal = date('Ymd');
$jam = date('H:i:s');

function backupFile($backup, $nama_tabel) {
    global $mysqli;
    $sql_back_up = "SELECT * INTO OUTFILE '$backup' FROM $nama_tabel";
    return mysqli_query($mysqli, $sql_back_up);
}

function restoreFile($restore, $nama_tabel) {
    global $mysqli;    
    $sql_back_up = "LOAD DATA INFILE '$restore' INTO TABLE $nama_tabel";
    return mysqli_query($mysqli, $sql_back_up);
}
?>

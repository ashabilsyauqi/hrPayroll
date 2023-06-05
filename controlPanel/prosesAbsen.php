<?php
// Nama file JSON
$jsonFile = '../data/dataKaryawan.json';

// Mendapatkan data JSON dari file
$jsonData = file_get_contents($jsonFile);

// Mendekode JSON menjadi array asosiatif
$data = json_decode($jsonData, true);

// Mendapatkan nilai yang diinput dari form
$namaInput = $_POST['namaKaryawan'];

// Melakukan penambahan (increment) pada objek "absen" jika nama yang dimasukkan sama dengan nama pada array
foreach ($data as &$item) {
    if ($item['nama'] === $namaInput) {

        if($item['absen'] <= 24){
            $item['absen'] = $item['absen'] + 1;
        }
        break;
    }
}

// Mengubah array kembali menjadi JSON
$jsonUpdated = json_encode($data,JSON_PRETTY_PRINT);

// Menulis JSON yang telah diupdate ke file
file_put_contents($jsonFile, $jsonUpdated);

// Redirect kembali ke halaman form
header('Location: ../pages/login.php');
exit;
?>

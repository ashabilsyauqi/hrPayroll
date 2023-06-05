<?php


    $fileJsonKaryawan = '../data/dataKaryawan.json';
    $dataJsonKaryawan = file_get_contents($fileJsonKaryawan);
    $dataKaryawan = array();
    $dataKaryawan = json_decode($dataJsonKaryawan, true);

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $email = $_POST['email'];
        $noTelp = $_POST['noTelp'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $posisi = $_POST['posisi'];
        if($posisi === "Manager"){
            $gajiPokok = number_format(10000000);
        } else if($posisi === "Developer"){
            $gajiPokok = number_format(8500000);
        } else if($posisi === "Staff"){
            $gajiPokok = number_format(4500000);
        } else if($posisi === "Selles"){
            $gajiPokok = number_format(4000000);
        } else if($posisi === "Marketing"){
            $gajiPokok = number_format(5000000);
        }

        if($gajiPokok >= 7500000){
            $pajak = .12;
        } else {
            $pajak = .08 ;
        }
        $besarPajak = ($gajiPokok * $pajak)*1000000;
        $besarPajak = number_format($besarPajak);
    


        $dataBaru = array( 
            'nama'=>$nama,
            'nik'=>$nik,
            'email'=>$email,
            'noTelp'=>$noTelp,
            'jenisKelamin'=>$jenisKelamin,
            'posisi'=>$posisi,
            'gajiPokok'=>$gajiPokok,
            'pajak' => $pajak,
            'besarPajak' => $besarPajak,
            'absen'=> 1,
        );

        array_push($dataKaryawan, $dataBaru);
        $dataToJsonKaryawan = json_encode($dataKaryawan, JSON_PRETTY_PRINT);
        file_put_contents($fileJsonKaryawan, $dataToJsonKaryawan);

        header('Location: ../index.php');
    }
?>
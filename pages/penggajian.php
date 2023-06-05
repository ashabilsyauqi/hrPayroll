<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/logoCompany.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Penggajian | PT.Ashabil</title>
</head>
<?php
    include '../controlPanel/processing.php';
    session_start();

    if (!isset($_SESSION['loggedIn'])) {
        header("Location: loginHr.php");
        exit;
    }
?>
<body>

<div class="d-flex justify-content-center align-items-center vh-100 bg-primary">
    <div class="card p-4"  style="width:70rem;">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nama</th>
                <th scope="col">Posisi</th>
                <th scope="col">kehadiran</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Gaji x Absen</th>
                <th scope="col">Pajak</th>
                <th scope="col">Besar Pajak</th>
                <th scope="col">Total Gaji</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $fileJson = file_get_contents('../data/dataKaryawan.json');
                    $dataJson = json_decode($fileJson, true);

                    $totalHariKerja = 25;


                    foreach($dataKaryawan as $karyawan){
                    $absen = intval(str_replace(',', '', $karyawan['absen']));
                    $gajiPokok = intval(str_replace(',', '', $karyawan['gajiPokok']));
                    $pajak = intval(str_replace(',', '', $karyawan['pajak']));
                    if($pajak === 0.12){
                        $pajak = "12%";
                    } else {
                        $pajak = "8%";
                    }

                    $besarPajak = intval(str_replace(',', '', $karyawan['besarPajak']));
                    $upahPerhari = $gajiPokok / $totalHariKerja;
                    $gajiTerima = $upahPerhari * $absen;
                    $totalgaji = $gajiTerima - $besarPajak ;

                        echo"  
                        <tr>
                            <td>$karyawan[nama]</td>
                            <td>$karyawan[posisi]</td>
                            <td>$karyawan[absen]</td>
                            <td>$karyawan[gajiPokok]</td>
                            <td>". number_format($gajiTerima) ."</td>
                            <td>$pajak</td>
                            <td>$karyawan[besarPajak]</td>
                            <td>". number_format($totalgaji) ."</td>
                        </tr>";
                    }   
                ?>
            </tbody>
        </table>
        <a href="showData.php" class="btn btn-dark ms-1">back</a>
    </div></div>
</div>

</body>
</html>

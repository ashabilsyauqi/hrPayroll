<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/logoCompany.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>DATA ABSEN | PT.Ashabil</title>
</head>
<?php
   session_start();

   if (!isset($_SESSION['loggedIn'])) {
       header("Location: loginHr.php");
       exit;
   }


    if(isset($_POST['kosongAbsen'])){
        $fileJsonKaryawan = '../data/dataKaryawan.json';
        $fileKaryawan = file_get_contents($fileJsonKaryawan);
        $dataFileKaryawan = json_decode($fileKaryawan, true);
        foreach ($dataFileKaryawan as &$karyawan) {
            $karyawan['absen'] = 1;
        }

        $dataToJson = json_encode($dataFileKaryawan,JSON_PRETTY_PRINT);
        file_put_contents($fileJsonKaryawan,$dataToJson);

        header('Location: showAbsen.php');
    }
?>
<body>
    <div class="d-flex justify-content-center align-items-center bg-primary vh-100">
        <div class="card p-3" style="width:70rem;">
            <div class="table-responsive">
                <table class="table">
                <table class="table caption-top">
                    <caption>List of Employes</caption>
                    <thead>
                        <tr>
                        <th scope="col">NAMA</th>
                        <th scope="col">NIK</th>
                        <th scope="col">ABSENSI</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include '../controlPanel/processing.php';
                            foreach($dataKaryawan as $karyawan){
                            echo   "         
                            <tr>
                                <th scope='row'>$karyawan[nama]</th>
                                <td scope='row'>$karyawan[nik]</td>
                                <td scope='row'>$karyawan[absen]</td>
                            </tr>";
                            }
                        ?>
            
                    </tbody>
                    </table>
                </table>

                <div class="mb-3 d-flex justify-content-between">
                <a href="showData.php" class="btn btn-dark ms-1">back</a>
                <form action="showAbsen.php" method="POST">
                    <button class="btn btn-dark" type="submit" name="kosongAbsen">kosongkan</button>      
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
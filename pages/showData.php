<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/logoCompany.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>ShowData | PT.Ashabil</title>
</head>
<?php
    session_start();
    if (!isset($_SESSION['loggedIn'])) {
        header("Location: loginHr.php");
        exit;
    }
    

    

    if(isset($_POST['delete'])){
        file_put_contents('../data/dataKaryawan.json', '[]');
        header('Location: showData.php');
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
                                <th scope="col">EMAIL</th>
                                <th scope="col">TELP</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">POSISI</th>
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
                                        <td scope='row'>$karyawan[email]</td>
                                        <td scope='row'>$karyawan[noTelp]</td>
                                        <td scope='row'>$karyawan[jenisKelamin]</td>
                                        <td scope='row'>$karyawan[posisi]</td>
                                    </tr>";
                                    }
                                ?>
                    
                            </tbody>
                        </table>    
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                 <a href="../index.php" class="btn btn-dark ms-1">input Karyawan</a>   
                                <form action="" method="POST">
                                    <button class="btn btn-danger " type="submit" name="delete">Delete All</button>
                                    <a href="showAbsen.php" class="btn btn-dark ms-1">Absensi</a>
                                    <a href="penggajian.php" class="btn btn-success ms-1">Penggajian</a>
                                </form> 
                            </div>
                        </div>                                                                                        
                </table>
            </div>
        </div>
    </div>
    </html> 
</body>  
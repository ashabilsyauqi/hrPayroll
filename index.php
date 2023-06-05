<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/logoCompany.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Input Data Karyawan |</title>

</head>
<?php
    $listJabatan = ['Developer','Manager','Staff','Selles','Marketing'];

    session_start();

 
    if (!isset($_SESSION['loggedIn'])) {
        header("Location: pages/loginHr.php");
        exit;
    }

    // Lanjutkan ke halaman index.php


?>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-primary">
        <div  class="card p-5 shadow-lg" style="width: 30rem;">
            <form action="controlPanel/processing.php" method="POST">
                <div class="mb-3">
                    <label for="nama">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama" />
                </div>
                <div class="mb-3">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" name="nik" />
                </div>
                <div class="mb-3">
                    <label for=email">email</label>
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="mb-3">
                    <label for="noTelp">No Telp</label>
                    <input type="number" class="form-control" name="noTelp" />
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select  class="form-control" name="jenisKelamin">
                        <option value="" selected>PILIH</option>
                        <option value="PRIA">Pria</option>
                        <option value="WANITA">Wanita</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="posisi">Posisi</label>
                    <select  class="form-control" name="posisi" >  
                    <option value="" selected>PILIH</option>
                        <?php
                            foreach($listJabatan as $jabatan){
                                echo"<option value='$jabatan'>$jabatan</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-end align-items-center gap-5">
                    <button type="submit" class="btn btn-dark" name="submit">submit</button> 
                    <a href="pages/showData.php" class="btn btn-dark ms-1">View Data</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
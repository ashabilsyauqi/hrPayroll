<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../assets/logoCompany.png">
  <title>ABSEN KARYAWAN | PT.Ashabil</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <style>
    .absensi-card {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
    }
    .card-header {
      background-color: #007bff;
      color: #fff;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }
  </style>
</head>
<?php
    $endPointKaryawan = file_get_contents('../data/dataKaryawan.json');
    $data = json_decode($endPointKaryawan,true);


    
    session_start();
    // Periksa apakah session dengan key 'nik' telah diset
    if(isset($_SESSION['nik'])){
        // Lakukan operasi yang diperlukan dengan menggunakan data session
        $nik = $_SESSION['nik'];
        // ...
    } else {
        // Jika session tidak ada, maka redirect ke halaman login atau lakukan tindakan lain
        header("Location: login.php");
        exit;
    }
?>
<body>
  <div class="container">
    <div class="card absensi-card">
      <div class="card-header text-center">
        <h2 class="card-title mb-0">Absensi</h2>
      </div>
      <div class="card-body">
      <form method="POST" action="../controlPanel/prosesAbsen.php">
        <?php
            foreach($data as $karyawan){
                if (isset($karyawan['nik']) && $karyawan['nik'] === $_GET['nama'] && isset($karyawan['nama'])) {
                  $usernameKaryawan = $karyawan['nama'];
              }
            }
        ?>
            <input type="hidden" name ="namaKaryawan" value="<?php echo $usernameKaryawan ?>">
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="absen">Absen</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
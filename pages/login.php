<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/logoCompany.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Login Karyawan | PT.AShabil</title>
</head>
<?php
    $endPointKaryawan = file_get_contents('../data/dataKaryawan.json');
    $data = json_decode($endPointKaryawan,true);


    if (isset($_POST['login'])) {
        $username = $_POST['namaUser'];
        $password = $_POST['passwordUser'];
    
        // Cek kecocokan username dengan objek nama dalam file JSON
        foreach ($data as $karyawan) {
            if (isset($karyawan['nama']) && $karyawan['nama'] === $username && $karyawan['nik'] === $password) {
                // Jika username dan password cocok
                // Mulai session
                session_start();
                // Set session dengan data yang dibutuhkan (misalnya, nik)
                $_SESSION['nik'] = $karyawan['nik'];
                // Redirect ke halaman absen.php
                header("Location: absen.php?nama=$karyawan[nik]");
                exit;
            }
        }
    
        // Jika username atau password tidak cocok, berikan pesan kesalahan atau lakukan tindakan lain
        echo "Username atau password salah!"; // Contoh pesan kesalahan
    }
    
?>
<body>
    <div class="d-flex justify-content-center align-items-center bg-dark vh-100">
        <div class="card p-4">
            <h2 class="text-center">Login Karyawan</h2>
            <hr>            
            <div class="card-body">
            <form method="POST">
                <div class="form-group mb-3">
                    <label for="namaUser">Username</label>
                    <select name="namaUser" id="namaUser" class="form-control" required>
                    <option value="" selected>NAMA KARYAWAN</option>
                    <?php
                        foreach($data as $karyawan){
                            $nama = $karyawan['nama'];
                        echo "<option value='$nama'>$nama</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="passwordUser">Password</label>
                    <input type="password" name="passwordUser" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-dark" name="login">Login</button>
                </div>
              </form>
            </div>
          </div>
    </div>
</body>
</html>
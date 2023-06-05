<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/logoCompany.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Login HR| PT.AShabil</title>
</head>
<?php
    if (isset($_POST['login'])) {
        $username = "admin";
        $password = "admin";

        $passUser = $_POST['password'];
        $namaUser = $_POST['username'];
        if($namaUser === $username && $passUser === $password){
            session_start();
            $_SESSION['loggedIn'] = true;
            header("Location: ../index.php");
            exit;    
        }else{
            echo "Username atau password salah!"; 
        }

    }
    
?>
<body>
    <div class="d-flex justify-content-center align-items-center bg-dark vh-100">
        <div class="card p-4">
            <h2 class="text-center">Login Admin</h2>
            <hr>            
            <div class="card-body">
            <form method="POST">
                
                <div class="form-group mb-3">
                    <label for="username">username</label>
                    <input type="text" name="username" class="form-control" require>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 background">
        <div  class="card p-5 shadow-lg" style="width: 30rem;">
            <form action="">
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
                    <label for="JenisKelamin">Jenis Kelamin</label>
                    <select  class="form-control" name="JenisKelamin" />
                </div>
                <div class="mb-3">
                    <label for="Posisi">Posisi</label>
                    <select  class="form-control" name="Posisi" />
                </div>
                <div class="mb-3">
                    <label for="JenisKelamin">Gaji Pokok</label>
                    <select  class="form-control" name="JenisKelamin" />
                </div>
                <div class="mb-3">
                    <label for="lamakerja">lama kerja</label>
                    <select  class="form-control" name="lamakerja" />
                </div>
                <div class="d-flex justify-content-end align-items-center gap-5">
                    <button class="btn btn-dark" name="submit">submit</button> 
                </div>
            </form>

        </div>
    </div>
</body>
</html>

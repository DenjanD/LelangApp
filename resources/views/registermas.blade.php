<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LelangApp - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <h3 class="text-center mt-5" style="color:white;">Register to LelangApp</h3>
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="register/regattempt" method="POST" onsubmit="return cekform()">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inNama" class="form-control" name="nama_lengkap"
                                placeholder="Ketik nama Anda">
                            <label for="inNama">Nama Lengkap</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inUname" class="form-control" name="username"
                                placeholder="Ketik username Anda">
                            <label for="inUname">Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inPassword" class="form-control" name="password"
                                placeholder="Ketik password anda">
                            <label for="inPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inConfirmPassword" class="form-control" name="confirmpassword"
                                placeholder="Ketik kembali password">
                            <label for="inConfirmPassword">Confirm Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" id="inTelepon" class="form-control" name="telp"
                                placeholder="Ketik nomor Anda">
                            <label for="inTelepon">Telepon</label>
                        </div>
                    </div>
                    <!-- Script Cek Kolom -->
                    <script>
                        function cekform() {
                            var name = document.getElementById('inNama').value
                            var uname = document.getElementById('inUname').value;
                            var pass = document.getElementById('inPassword').value;
                            var confpass = document.getElementById('inConfirmPassword').value;
                            var telepon = document.getElementById('inTelepon').value;

                            if (name.length == 0) {
                                swal('Peringatan', 'Nama masih kosong!', 'warning');
                                return false;
                            }
                            else {
                                if (uname.length == 0) {
                                    swal('Peringatan', 'Username masih kosong!', 'warning');
                                    return false;
                                }
                                else {
                                    if (pass.length == 0) {
                                        swal('Peringatan', 'Password masih kosong!', 'warning');
                                        return false;
                                    }
                                    else {
                                        if (confpass.length == 0) {
                                            swal('Peringatan', 'Konfirmasi password masih kosong!', 'warning');
                                            return false;
                                        }
                                        else {
                                            if (telepon.length == 0) {
                                                swal('Peringatan', 'Telepon masih kosong!', 'warning');
                                                return false;
                                            }
                                            else {
                                                if (pass != confpass) {
                                                    swal('Peringatan', 'Periksa kembali password Anda!', 'warning');
                                                    return false;
                                                }
                                                else {
                                                    return true;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    </script>
                    <!-- /Script Cek Kolom -->
                    <input type="submit" class="btn btn-primary btn-block" value="Register">
                </form>
                <div class="text-center d-block small mt-3">
                    Sudah daftar? <a href="/">Login</a>
                </div>
            </div>
        </div>
        <center><a href="#" style="color: transparent;" data-toggle="modal"
                data-target="#modalAdminPetugas"><small>Admin/Petugas</small></a></center>
    </div>

    <script src="js/sweetalert.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
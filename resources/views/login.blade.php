<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LelangApp - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <h3 class="text-center mt-5" style="color:white;">LelangApp</h3>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="logattempt" method="GET" onsubmit="return cekform()">
          <div class="form-group">
            <input type="hidden" class="form-control" name='logCode' value="1">
            <div class="form-label-group">
              <input type="text" id="inUname" class="form-control" name="username" placeholder="Username">
              <label for="inUname">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inPassword" class="form-control" name="password" placeholder="Password">
              <label for="inPassword">Password</label>
            </div>
          </div>
          <!-- Script Cek Kolom -->
          <script>
            function cekform() {
              var uname = document.getElementById('inUname').value;
              var pass = document.getElementById('inPassword').value;

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
                  return true;
                }
              }
            }
          </script>
          <!-- /Script Cek Kolom -->

          <input type="submit" class="btn btn-primary btn-block" value="Login">
        </form>
        <div class="text-center d-block small mt-3">
          Belum punya akun? <a href="register">Daftar Sekarang</a>
        </div>
      </div>
    </div>
    <center><a href="#" style="color: transparent;" data-toggle="modal" data-target="#modalAdminPetugas"><small>Admin/Petugas</small></a></center>
  </div>

  <!-- Admin/Petugas Modal-->
  <div class="modal fade" id="modalAdminPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukan Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="adpetugasmin" method="GET" onsubmit="return cek()">
          <input type="password" class="form-control" id="kolPass" placeholder="Ketik password di sini">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">Batal</button>
          <input type="submit" class="btn btn-primary" value="Submit">
        </form>
        <!-- Secret Modal Cek -->
        <script>
          function cek() {
            var password = document.getElementById('kolPass').value;

            if (password == 'typoqwerty123!') {
              return true;
            }
            swal('Peringatan','Password tidak benar','warning');
            return false;
          }
        </script>
        </div>
      </div>
    </div>
  </div>

  <script src="js/sweetalert.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
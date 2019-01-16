<?php 
include '../koneksi/koneksi.php'; 
if ( ! empty(ses('admin_login'))) {
   redirect('index.php');
   exit();
}

if (isset($_POST['aksi']) && $_POST['aksi']=='login') {
   $admin_user = 'admin';
   $admin_pass = 'admin';
   if ($_POST['user'] == $admin_user && $_POST['pass'] == $admin_pass) {
      $_SESSION['admin_login'] = TRUE;
      alert('Login Berhasil!');
      redirect('index.php');
   } else {
      alert('User atau Password salah!');
      redirect('login.php');
   }
   exit();
}

?><!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Cafe</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
   <div class="container">
      <h1 class="text-center mb-3"> HIP HIP Hore</h1>
      <div class="row justify-content-center">
         <div class="col-md-4">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="">
               <h3 class="text-center">Login</h3>
            </div>
               <div class="form-group">
                  <label>User</label>
                  <input type="text" class="form-control" name="user">
               </div>
               <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="pass">
               </div>
               <div class="form-group">
                  <button class="btn btn-primary" name="aksi" value="login" type="submit">Login</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>
</html>
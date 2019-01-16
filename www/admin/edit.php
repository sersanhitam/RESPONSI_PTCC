<?php 
include '../koneksi/koneksi.php'; 
if (empty(ses('admin_login'))) {
   alert('Anda belum login!');
   redirect('login.php');
   exit();
}

$brg = new Barang();
if (isset($_POST['aksi']) && $_POST['aksi']=='ubah') {
   $brg->ubah($_GET['id'], $_POST['nama'], $_POST['desc'], $_FILES['foto'], $_POST['harga']);
   alert('Diubah!');
   redirect('index.php');
   exit();
}
$data = $brg->ambil($_GET['id']);
?><!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Anggota Club</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
   <div class="container">
      <h1 class="text-center mb-3">Edit Data</h1>
      <div class="row justify-content-center">
         <div class="col-md-4">
            <form action="edit.php?id=<?php echo $data->id ?>" enctype="multipart/form-data" method="post">
               <div class="form-group">
                  <label>id</label>
                  <input type="text" class="form-control" name="id" value="<?php echo $data->id ?>">
               </div>
               <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $data->nm_barang ?>">
               </div>
               <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" name="desc" value="<?php echo $data->deskripsi ?>">
               </div>
               <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga" value="<?php echo $data->harga ?>">
               </div>
               <div class="form-group">
                  <label>Foto</label>
                  <img src="../foto/<?php echo $data->foto ?>" alt="Foto" width="100">
                  <input type="file" class="form-control" name="foto">
               </div>
               <div class="form-group">
                  <button class="btn btn-primary" name="aksi" value="ubah" type="submit">Ubah</button>
                  <a class="btn btn-info" href="index.php">Kembali</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>
</html>
<?php 
include '../koneksi/koneksi.php'; 
if (empty(ses('admin_login'))) {
   alert('Anda belum login!');
   redirect('login.php');
   exit();
}

$brg = new Barang();
if (isset($_POST['aksi']) && $_POST['aksi']=='tambah') {
   $brg->tambah($_POST['nama'], $_POST['desc'], $_FILES['foto'], $_POST['harga']);
   alert('Ditambah!');
   redirect('index.php');
   exit();
}
// hapus data
if (isset($_GET['aksi']) && $_GET['aksi']=='hapus') {
   $brg->hapus($_GET['id']);
   alert('Dihapus!');
   redirect('index.php');
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
      <h1 class="text-center mb-3"> HIP HIP Hore CRUD</h1>
      <div class="row justify-content-center">
         <div class="col-md-12 mb-3 justify-content-center text-center">
            <a href="index.php" class="btn btn-success d-print-none">Barang</a>
            <a href="transaksi.php" class="btn btn-success d-print-none">Transaksi</a>
            <a href="logout.php" class="btn btn-success d-print-none">Logout</a>
         </div>
         <div class="col-md-4">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="">
               <h3>Tambah barang</h3>
            </div>
               <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama">
               </div>
               <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" name="desc">
               </div>
               <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga">
               </div>
               <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto">
               </div>
               <div class="form-group">
                  <button class="btn btn-primary" name="aksi" value="tambah" type="submit">Tambah</button>
               </div>
            </form>
         </div>
         <div class="col-md-8">
            <table class="table table-sm table-bordered">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Nama</th>
                     <th>Deskripsi</th>
                     <th>Harga</th>
                     <th>Foto</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($brg->tampil() as $i => $row): ?>
                     <tr>
                        <td><?php echo ++$i ?></td>
                        <td><?php echo $row->nm_barang ?></td>
                        <td><?php echo $row->deskripsi ?></td>
                        <td><?php echo $row->harga ?></td>
                        <td><img src="../foto/<?php echo $row->foto ?>" alt="Foto" width="100"></td>
                        <td>
                           <a href="edit.php?id=<?php echo $row->id ?>" class="btn btn-sm btn-warning">Ubah</a>
                           <a href="index.php?aksi=hapus&id=<?php echo $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</a>
                        </td>
                     </tr>
                  <?php endforeach ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</body>
</html>
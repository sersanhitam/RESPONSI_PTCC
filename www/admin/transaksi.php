<?php 
include '../koneksi/koneksi.php'; 
if (empty(ses('admin_login'))) {
   alert('Anda belum login!');
   redirect('login.php');
   exit();
}

$trans = new Transaksi();
// set bayar data
if (isset($_GET['aksi']) && $_GET['aksi']=='bayar') {
   $trans->ubah($_GET['id'], '1');
   alert('Berhasil mengubah menjadi bayar!');
   redirect('transaksi.php');
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
         <div class="col-md-8">
            <table class="table table-sm table-bordered">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Nama Customer</th>
                     <th>No. Meja</th>
                     <th>Waktu</th>
                     <th>Status Bayar</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($trans->tampil() as $i => $row): ?>
                     <tr>
                        <td><?php echo ++$i ?></td>
                        <td><?php echo $row->nm_cust ?></td>
                        <td><?php echo $row->no_meja ?></td>
                        <td><?php echo tanggal('d M Y H:i', $row->wkt_pesan) ?></td>
                        <td><?php echo $row->sudah_bayar == '0' ? '<p class="text-danger mb-0">Belum</p>' : '<p class="text-success mb-0">Sudah</p>' ?></td>
                        <td>
                           <a href="transaksi_detail.php?id=<?php echo $row->id_pesan ?>" class="btn btn-sm btn-primary">Lihat</a>
                           <a href="transaksi.php?aksi=bayar&id=<?php echo $row->id_pesan ?>" class="btn btn-sm btn-info" onclick="return confirm('Apakah anda yakin?')">Bayar</a>
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
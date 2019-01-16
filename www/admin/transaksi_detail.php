<?php 
include '../koneksi/koneksi.php'; 
if (empty(ses('admin_login'))) {
   alert('Anda belum login!');
   redirect('login.php');
   exit();
}

$id_pesan = $_GET['id'];
$trans = new Transaksi();
$data = $trans->ambil($id_pesan);
$total = 0;
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
            <p><strong>Nama Customer</strong> : <?php echo $data->nm_cust ?></p>
            <p><strong>No. Meja</strong> : <?php echo $data->no_meja ?></p>
            <p><strong>Waktu Pesan</strong> : <?php echo tanggal('d M Y H:i', $data->wkt_pesan) ?></p>
            <p><strong>Status Bayar</strong> : <?php echo $data->sudah_bayar == '0' ? 'Belum' : 'Sudah' ?></p>
         </div>
         <div class="col-md-8">
            <table class="table table-sm table-bordered">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Nama Barang</th>
                     <th class="text-right">Harga</th>
                     <th class="text-right">Jumlah</th>
                     <th class="text-right">Subtotal</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($trans->ambil_detail($id_pesan) as $i => $row): ?>
                     <tr>
                        <td><?php echo ++$i ?></td>
                        <td><?php echo $row->nm_barang ?></td>
                        <td class="text-right"><?php echo rupiah($row->harga) ?></td>
                        <td class="text-right"><?php echo $row->qty ?></td>
                        <td class="text-right"><?php echo rupiah($row->qty * $row->harga) ?></td>
                     </tr>
                     <?php $total += $row->qty * $row->harga; ?>
                  <?php endforeach ?>
               </tbody>
               <tfoot>
                  <tr>
                     <th colspan="4">Total</th>
                     <th class="text-right"><?php echo rupiah($total) ?></th>
                  </tr>
               </tfoot>
            </table>
            <div class="text-center">
               <a href="transaksi.php" class="btn btn-success d-print-none">Kembali</a> 
               <button class="btn btn-info d-print-none" onclick="window.print()">Cetak</button>
            </div>
         </div>
      </div>
   </div>
</body>
</html>
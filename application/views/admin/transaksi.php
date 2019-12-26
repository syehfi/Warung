<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Admin Page</title>
</head>
<body>
<h1 style="text-align: center;">Daftar Pembelian</h1><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php
        $i = 1;
        foreach($transaksi as $pd){?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $pd['username'] ?></td>
                <td><?= $pd['nama_produk'] ?></td>
                <td><?= $pd['Qty'] ?></td>
                <td><?= $pd['total_harga'] ?></td>
                <td>
                    <a href="<?= base_url() ?>admin/deleteTransaksi/<?= $pd['id_transaksi']?>"><button type="button" class="btn btn-primary">Approve</button></a>
                </td>
            </tr>
        <?php } ?>
  </tbody>
</table>
</body>
</html>
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
<h1 style="text-align: center;">Daftar Produk</h1><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Kategori</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">Gambar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php
        $i = 1;
        foreach($produk as $pd){?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $pd['nama_produk'] ?></td>
                <td><?= $pd['deskripsi'] ?></td>
                <td><?= $pd['kategori'] ?></td>
                <td><?= $pd['harga'] ?></td>
                <td><?= $pd['stok'] ?></td>
                <td><img style="height: 200px; width:130px;" src="<?= base_url() ?>assets/upload/<?= $pd['gambar'] ?>" alt="" srcset=""></td>
                <td>
                    <a href="admin/detail/<?= $pd['id_produk']?>"><button type="button" class="btn btn-primary">Detail</button></a>
                    <a href="admin/ubah/<?= $pd['id_produk']?>"><button type="button" class="btn btn-warning">Edit</button></a>
                    <a href="admin/delete/<?= $pd['id_produk']?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                </td>
            </tr>
        <?php } ?>
  </tbody>
</table>
</body>
</html>
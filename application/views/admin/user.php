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
<h1 style="text-align: center;">Daftar User</h1><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Level</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php
        $i = 1;
        foreach($login as $user){?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['level'] ?></td>
                <td>
                    <a href="ubahUser/<?= $user['id_user']?>"><button type="button" class="btn btn-warning">Edit</button></a>
                    <a href="deleteUser/<?= $user['id_user']?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                </td>
            </tr>
        <?php } ?>
  </tbody>
</table>
</body>
</html>
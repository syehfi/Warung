<title>Edit User</title>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit User
                </div>
                    <form action="" method="post">
                        <input type="hidden" name="id_user" value="<?= $login['id_user'] ?>">                    
                        <div class="form-group">
                            <label for="nama_produk">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $login['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Password</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?= $login['password'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Level</label>
                            <input type="text" name="level" id="level" class="form-control" value="<?= $login['level'] ?>">
                        </div>
                        <a href="<?= base_url()?>user"><button type="submit" name="submit" class="btn btn-secondary float-right">Kembali</button></a>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
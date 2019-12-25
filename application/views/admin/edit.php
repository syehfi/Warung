<title>Edit Produk</title>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Produk
                </div>
                    <form action="" method="post">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">                    
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $produk['nama_produk'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Deskripsi Produk</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?= $produk['deskripsi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="form-control" value="<?= $produk['kategori'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga_produk">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="<?= $produk['harga'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-control" value="<?= $produk['stok'] ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<title>Detail Produk</title>

<form action="<?php echo base_url('Katalog/addCart/'.$produk['id_produk']) ?>" method="post">
<?php
    print_r($this->cart->contents());
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Produk
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $produk['nama_produk'] ?></h5>
                    <p class="card-text">
                        <label for=""><b>Harga Produk: </b>Rp. </label>
                        <?= $produk['harga'] ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Kategori: </b></label>
                        <?= $produk['kategori'] ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Stok: </b></label>
                        <?= $produk['stok'] ?>
                    </p>
                    <div class="form-group">
                        <label for="stok">Quantity</label>
                        <input type="number" name="stok" id="stok" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
                    <a href="<?= base_url()?>katalog" class="btn btn-primary">Kembali</a>
                
                </div>
            </div>
        </div>
    </div>
</div>
</form>
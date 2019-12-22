<h1 style="text-align: center;">Katalog Barang</h1>
<div class="card-deck mx-auto mt-5">
<?php
    $i = 1;
    foreach($produk as $pd){?>
    <div class="card text-white bg-secondary mb-3">
        <img class="card-img-top" src="<?= base_url();?>image/wallet.png" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><?= $pd['nama_produk']?></h5>
        <p class="card-text"><?= $pd['deskripsi']?></p>
        <h5 class="card-title">Harga Rp. <?= $pd['harga']?></h5>
        <a href="<?= base_url();?>katalog/detail/<?= $pd['id_produk']?>" class="btn btn-primary">Add To Cart</a>
        </div>
    </div>
<?php } ?>
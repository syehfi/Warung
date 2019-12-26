<title>Checkout</title>
<div class="jumbotron">

    <h1>Halaman Checkout</h1>
    <p>Cek Barang pembelian</p>
</div>

<div class="card">

<div class="card-body">

    <h4>Keranjang</h4>
    <hr style="margin: 5px">

    <table class="table" style="font-size: 16px">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
        <?php

        if (count($this->cart->contents()) > 0) {

            $total = 0;
            foreach ($this->cart->contents() as $row) {

                // tampilkan yang hanya memiliki id cart

                if ($row['id']) {

                    $total += $row['subtotal'];

        ?>

                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo 'Rp.' . number_format($total) ?></td>
                    </tr>

            <?php
                } // end if 
            } // end foreach
            ?>
            <tr>
                <td colspan="4" align="right"><b>Total : </b></td>
                <td><?php echo 'Rp.' . number_format($total) ?></td>
            </tr>
        <?php
        } // end if 
        ?>

    </table>
    <a href="<?= base_url() ?>katalog/pesan_proses">
        <button type="button" class="btn btn-primary">Beli</button>
    </a>
</div>

</div>


<div class="jumbotron">

    <h1>Halaman Checkout</h1>
    <p>Isi caption  . . .</p>

</div>

<div class="container">

    <div class="row">

        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <h4>Form</h4>
                    <hr style="margin: 5px">

                    <form action="">

                        <div class="form-group">
                            <label for="">Nama Pembeli</label>
                            <input type="text" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label for="">Label</label>
                            <input type="text" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label for="">Label</label>
                            <input type="text" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label for="">Label</label>
                            <input type="text" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label for="">Label</label>
                            <input type="text" class="form-control" value="" readonly />
                        </div>

                        <div class="form-group">
                            <label for="">Label</label>
                            <input type="text" class="form-control" value="" readonly />
                        </div>

                        <button type="submit"><a href=""></a>Test</button>

                    </form>

                </div>

            </div>
        </div>

        <div class="col-md-4">
            
            <div class="card">

                <div class="card-body">

                    <h4>Keranjang</h4>
                    <hr style="margin: 5px">
                    
                    <table class="table" style="font-size: 12px">

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php 
                        
                            if ( count($this->cart->contents()) > 0 ) { 
                                
                                $total = 0;
                                foreach ( $this->cart->contents() AS $row ) {
                            
                                    // tampilkan yang hanya memiliki id cart
                                    
                                    if ( $row['id'] ) {

                                        $total += $row['subtotal'];

                        ?>

                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['qty'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                            <td><?php echo 'Rp.'.number_format($row['subtotal']) ?></td>
                        </tr>

                        <?php 
                                    } // end if 
                            } // end foreach
                        ?> 
                        <tr>
                            <td colspan="4" align="right"><b>Total : </b></td>
                            <td><?php echo 'Rp.'.number_format($total) ?></td>
                        </tr>
                        <?php    
                        } // end if ?>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>
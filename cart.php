<?php
    session_start();
    //call header
    include_once 'includes/header.php';
?> 

<!--Main body-->
<div class="wrapper" style="margin-bottom:150px;">
    <div class="container">
        <h4 style="font-weight:bold; margin:20px;">SHOPPING CART</h4>
        <div class="col-sm-10">
            <table class="table">
                <?php
                    include_once 'includes/dbh.inc.php';
                     //create a query
                    $sql = "SELECT*FROM `cart`";
                    $result = $conn->query($sql);
                    $total=0;

                    if ($result->num_rows > 0) {
                     // output data of each row
                        while($row = $result->fetch_assoc()) {
                            //caculate total price
                            $total += $row['product_price'];
                ?>
                <tbody>
                    <tr>
                        <!-- calling all the data from database -->
                        <td><img src="<?php echo $row['product_image']?>" style="max-width: 150px;"></td>
                        <td>
                            <b><?php echo $row['product_name']?></b><br>
                            $<?php echo number_format($row['product_price'],2)?><br><br>
                            Qty:&nbsp;<?php echo $row['product_qty']?>
                        </td>
                        <td><i class="fa fa-trash-o" style="font-size:24px"></i></td>
                    </tr>
                </tbody>
                    
                <?php
                    }
                    } else {
                    echo "No results";
                    }
                ?>
            </table>
            <table class="float-right">
                <tr>
                    <!-- print out price -->
                    <td><b>Subtotal</b></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $total?></td>
                </tr>
                <tr>
                    <?php
                        $tax = $total*0.1;
                        $total += $tax;
                    ?>
                    <td><b>Tax(10%)</b></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo number_format($tax,2)?></td>
                </tr>
                <tr>
                    <td><b>Total</b></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo number_format($total,2)?></td>
                </tr>  
                <tr>
                    <!-- go to payment -->
                    <td>
                        <a href="payment.php" class="btn btn-dark float-rigth">Go to payment</a>     
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
    //call footer
    include_once 'includes/footer.php';
?> 
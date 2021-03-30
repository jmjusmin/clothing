<?php
    session_start();
    //call header
    include_once 'includes/header.php';
    
    // get the $product_id from url that passing through the link
    $pid=$_GET['product_id'];
?>
<!--Main body-->
<div class="wrapper">
    <!--content filter by recent content-->
    <div class="container">
        <!--get infinity content on web-->
        <div class="row">

            <?php
                //get connection with database
                include_once 'includes/dbh.inc.php';
                //create a query
                $sql = "SELECT*FROM `products` WHERE `product_id`=$pid";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
            ?>    

            <!-- create 2 columns = 1st -->
            <div class="col-sm-8">
                <div style="padding:30px">
                    <!-- insert img from database -->
                    <img class="card-img-top" style = "border-radius:0px;"
                     src= <?php echo $row['image']?> alt="Card image cap">
                </div>
            </div>
            <!-- create 2 columns = 2nd -->
            <div class="col-sm-4">
                <!--create a card  -->
                <div class="card p-0" style = "margin:50px; border-radius:0px; border-style: none;">
                    <div class="card-body">
                        <!-- insert name from database -->
                        <h4 class="card-title" style="font-weight:bold;font-size: 1.5em; padding-top:10px; padding-bottom:0px;">
                            <?php echo $row['name']?>
                        </h4>
                        <hr>
                        <!-- insert detail from database -->
                        <p class="card-text"><?php echo $row['detail']?></p>
                        <!-- insert price from database -->
                        <label class="card-title" style="font-weight: normal; font-size: 1em; padding bottom:0px;">
                            <?php echo number_format($row['price'],2);?>&nbspUSD
                        </label>
                        <br><hr>
                        <!-- create a from to get product detail -->
                        <form method="post">
                            <input type="hidden" name="pid" value="<?= $row['product_id'] ?>">
                            <input type="hidden" name="pname" value="<?= $row['name'] ?>">
                            <input type="hidden" name="pprice" value="<?= $row['price'] ?>">
                            <input type="hidden" name="pimage" value="<?= $row['image'] ?>">
                            <!-- btn to update cart -->
                            <button class="btn btn-dark btn-block addItemBtn" name="cart_submit">
                            Add to cart</button>
                        </form>
                    </div>
                </div>  
            </div>
            <?php
                }
                } else {
                echo "No results";
                }
            ?>
        </div>  
    </div>
</div>
<?php
    // check if user click the button
    if(isset($_POST['cart_submit'])){
        // get the input
        $pid = $_POST["pid"];
        $pname = $_POST["pname"];
        $pimage = $_POST["pimage"];
        $pqty = 1;
        $pprice = $_POST["pprice"];
        $ptotal=$pqty*$pprice;

        //insert an item in database
        $sql2 = "INSERT INTO `cart`(product_id,product_name,
        product_image,product_qty,product_price,total_price)
        VALUES('".$pid."','".$pname."','".$pimage."','".$pqty."','".$pprice."','".$ptotal."')";
        $result2 = $conn->query($sql2);

        // check if insert data correct or not->alert
        if($result2)
        {
            echo '<script>alert("Item added!")</script>'; 
        }
        else{
            echo '<script>alert("Something went wrong. Try again!")</script>';
        }
    }
    $conn->close();        
?>
<!-- ***Future develop***I want to use ajax to update cart
    <script type="text/javascript">
    //get this ducument ready
    $(document).ready(function(){
        try {
            //get .addItemBtn we create in form
            //create a function when click
            $("#addItemBtn").click(function(e){
            e.prevenDefault();
            //get all the value input from form
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();

            //using ajax to update cart and database
            $.ajax({
                url: 'action.php',
                method: 'post',
                data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage},
                //pop-up message when success
                success:function(response){
                    $("msg").html(response);
                }
            });
        });
        } catch(ex) {
            alert('An error occurred and I need to write some code to handle this!');
        }
    });
</script> -->
<?php
    //call footer
    include_once 'includes/footer.php';
?>
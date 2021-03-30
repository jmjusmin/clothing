<?php
    session_start();
    //call header
    include_once 'includes/header.php';
?> 

<!--Main body-->
<div class="wrapper">
  <div class="container">
    <!--get infinity content on web-->
    <div class="row">
      <?php
        //get connection with database
        include_once 'includes/dbh.inc.php';

        //create a query
        $sql = "SELECT*FROM `products`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
      ?>    
      <!-- make a responsive when show item -->
      <div class="col-sm-6 col-md-4 col-lg-4 mb-2" >
        <!--create a card  -->
        <a href="product.php?product_id=<?php echo$row['product_id']?>" style="color:black; text-decoration:none;">
          <div class="card" style = "margin:10px; border-radius:0px; border-style: none;">
              <div>
                <div class="card-body p-0">
                  <!-- insert img from database -->
                  <img class="card-img-top" style = "border-radius:0px;"
                  src= <?php echo $row['image']?> alt="Card image cap">
                </div>
              </div>
              <!-- insert name from database -->
              <h4 class="card-title" style="font-size: 0.8em; padding-top:10px; padding-bottom:0px;">
                <?php echo $row['name']?>
              </h4>
              <!-- insert price from database -->
              <label class="card-title" style="font-weight: normal; font-size: 0.7em; padding bottom:0px;">
                <?php echo number_format($row['price'],2);?>&nbspUSD
              </label>
            </div>
          </a>
      </div>
      <?php
        }
        } else {
          echo "No results";
        }
        $conn->close();
      ?>
    </div>  
  </div>
</div>
<?php
    //call footer
    include_once 'includes/footer.php';
?> 
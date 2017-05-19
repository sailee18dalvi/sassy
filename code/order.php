<?php
  require_once("header.php");
?>
<div class="container-order">
  <div class="panel panel-default panel-danger">
    <div class="panel-heading "> <strong>Confirm Order</strong> </div>
    <div class="panel-body">
    <?php
    if((isset($_GET['pid']) && isset($_GET['qty'])) ||(isset($_COOKIE['cart']) && isset($_COOKIE['total'])))
    {
      if(isset($_GET['pid']) && isset($_GET['qty']))
      {	
	       $pid=$_GET['pid'];
	       $qty=$_GET['qty'];
	       $query = "SELECT name,price from products where pid='$pid'";
	       $result = mysql_query($query);
	       $name=mysql_result($result,0,"name");
	       $price=mysql_result($result,0,"price");
         ?>
      <div class="row">
        <div class="col-md-3">Product Name</div>
        <div class="controls col-lg-6" id="name"><?php echo $name;?> </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3">Product Price</div>
        <div class="controls col-lg-6" id="price"><?php echo $price;?> </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3">Quantity</div>
        <div class="controls col-lg-6" id="qty"><?php echo $qty;?> </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3">Total</div>
        <div class="controls col-lg-6" id="price"><?php echo $price*$qty;?> </div>
      </div>
      <br>
			

      <div class="row">
        <div class="reg">
        <a class="order" href="order_success.php?pid=<?php echo $pid?>&qty=<?php echo $qty?>">
        <button class="button-order" ><span class="glyphicon glyphicon-lock" aria-hidden="true" style="margin-right:5px"></span> 
        Buy &nbsp;</button></a>
      </div>
    <?php   
    }

    ?>

<?php
if(isset($_COOKIE['cart']) && isset($_COOKIE['total']))
{
    $total=$_COOKIE['total'];
    $cart =$_COOKIE['cart'];
	  foreach($cart as $pid=>$qty)
	  {
		  $query = 'SELECT name,price from products where pid='.$pid;
		  $result = mysql_query($query);
		  $name=mysql_result($result,0,"name");
		  $price=mysql_result($result,0,"price");
?>
    <div class="row">
      <div class="col-md-3">Product Name</div>
      <div class="controls col-lg-6" id="name"><?php echo $name;?> </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3">Product Price</div>
      <div class="controls col-lg-6" id="price"><?php echo $price;?> </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3">Quantity</div>
      <div class="controls col-lg-6" id="qty"><?php echo $qty;?> </div>

    </div>
    <br>
        <div class="row">
      <div class="col-md-3">Total Price</div>
      <div class="controls col-lg-6" id="price"><?php echo $price*$qty;?> </div>
   </div>
    <br>
    <div class="reg">
      <a class="delete" href="cart.php?action=delete&pid=<?php echo trim($pid,"'")?>" ><input type="submit" class="delete-order" value="Delete Product" >
      </a>
    </div>
			
<?php   
}

?>
    <br>
    <div class="row">
      <div class="col-md-3">Total</div>
      <div class="controls col-lg-6"><?php echo $total;?> </div>
    </div>
    <br>

    <div class="row">
      <div class="reg">
      <a class="order" href="order_success.php">
       <button class="button-order" ><span class="glyphicon glyphicon-lock" aria-hidden="true" style="margin-right:5px"></span> 
       Buy &nbsp;</button></a>
    </div>
  <?php
  }
  }
  else
  {
	echo "No products!!";
  }
  ?>
    </div>
  </div>
</div>
<?php
require_once("footer.php");
?>

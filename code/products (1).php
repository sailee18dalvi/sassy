<?php
  require_once("header.php");
?>

<script>
function buy(pid)
{
	$("#cart_form"+pid).attr("action","order.php");
	$("#cart_form"+pid).submit();
}

</script>

<?php
$uid=0;
if (!empty($_COOKIE['uid']))
{      
      $uid= $_COOKIE['uid'];
}
$msg="";
$cid = $_GET['cid'];
$query = 'SELECT * from products where cid='.$cid;
$r = mysql_query($query);
while($row = mysql_fetch_assoc($r))
{
  if($row['qty']>0)
  {
?>

<div class="main-panel">
<div class="left">
<img src="<?php echo $row['pid']?>.jpg" width = "350px" height= "300px" >
</div>
<div class="right">
<p><strong> <?php echo ''.$row['name'].'<br>Price: ₹ '.$row['price']?> </p>
  <?php 
  if($uid==1)
  {
    ?>
    
    <p> <?php echo 'Category ID = '.$row['cid'].'<br>Product ID = '.$row['pid']?> </p>

<?php
  }
else
{ 
?> 
  <form id="cart_form<?php echo $row['pid']?>" action="cart.php" method="get">

  Quantity:&nbsp;</strong>
  <select id="selectqty" name="qty">
  	<option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>" />
   <input type="hidden" name="action" value="add" />
  <br ><p>
  <br>
   <input type="submit" class="button-product" value="Add to Cart" />
   
   &nbsp;  <input type="button" onclick="buy(<?php echo $row['pid']?>)" class="button-product" value="Buy Now" />
</form></p>


<?php
}
?>
 </div>
</div>
<?php

}
}
?>
<br>

<?php
require_once("footer.php");
?>
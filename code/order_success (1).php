<?php
require_once("header.php");
$tid=uniqid('sslt');
if(isset($_GET['pid']) && isset($_GET['qty']))
{	

	$pid=$_GET['pid'];
	$qty=$_GET['qty'];
	$query = "SELECT qty from products where pid='$pid'";
	$result = mysql_query($query);
	$quantity=mysql_result($result,0,"qty");
	$sub=$quantity-$qty;
	$query1="UPDATE products SET qty='$sub' WHERE pid=$pid";
	$result1=mysql_query($query1);
	$query2 = "INSERT into transaction (uid,pid,tid,qty) values ('$uid','$pid','$tid','$qty')";	
    
	   										
	   										$result2 = mysql_query($query2);


}
elseif(isset($_COOKIE['cart']) && isset($_COOKIE['total']))
{
	$cart =$_COOKIE['cart'];
	foreach($cart as $pid=>$qty)
	{
		
		$query = 'SELECT qty from products where pid='.$pid;
		$result = mysql_query($query);
		$quantity=mysql_result($result,0,"qty");
		$sub=$quantity-$qty;
		$query1="UPDATE products SET qty='$sub' WHERE pid=$pid";
		
		$result1=mysql_query($query1);
			
		$result1=mysql_query($query1);
		$query2 = "INSERT into transaction (uid,pid,tid,qty) values ('$uid','$pid','$tid','$qty')";	
    	$result2 = mysql_query($query2);
	}


}
		setcookie("cart","",time()-3600);
		setcookie("total","",time()-3600);

?>
<div class="container">
	<div class="panel panel-default panel-danger">
	<div class="panel-heading "> <strong>Checkout</strong> </div>
		<div class="panel-body">
			<p>Order Confirmed!</p>
			<p>You will receive your order within 15 days!</p>
			<p>Order will be delivered to your registered Shipping Address.</p>
			<p>Thank you for shopping with us...</p>
		</div>
	</div>
</div>
<br>
<br>
<?php
require_once("footer.php");
?>
<?php
//logged in
function loggedin()
 	{
		 	if (isset($_COOKIE['uid']) && !empty($_COOKIE['uid']))
			return $_COOKIE['uid'];
			else
			return false;
 	}
if(loggedin())
{
$c = mysql_connect('localhost','root','');
$db = mysql_select_db('sassy3004');
error_reporting(E_ERROR);
if(!isset($_COOKIE['cart']) && !isset($_COOKIE['total']))
{
$total=0;
}
else
{
	$total = $_COOKIE['total'];
	$cart = $_COOKIE['cart'];
}
$pid = $_GET['pid'];
$qty = $_GET['qty'];
$action = $_GET['action'];
//setcookie("cart",$cart,$exp_time);
$referer = basename($_SERVER['HTTP_REFERER']);
switch($_GET['action'])
{
	case "add":
	{		
		$query="SELECT qty from products WHERE pid='$pid'";
		$result=mysql_query($query);
		$quantity=mysql_result($result,0,"qty");
		if($qty<=$quantity)
		{
		$cart[$pid]=$qty;
		$query2 = "SELECT price from products where pid='$pid'";
		$result2 = mysql_query($query2);
		$price=mysql_result($result2,0);
		$total+=$price*$qty;
		setcookie("cart['$pid']",$qty);
		setcookie("total",$total);	
		}
		else
		{
		$msg="Not Available in stock!";
		}
		
		break;
	}
	case "delete":
	{	
		$pid=$_GET['pid'];
		$cart = $_COOKIE['cart'];
		$qty=$cart["'".$pid."'"];
		$total = $_COOKIE['total'];
		$query = "SELECT price from products where pid='$pid'";
		$result = mysql_query($query);
		$price=mysql_result($result,0);
		
		$total-=$price*$qty;
		setcookie("cart['$pid']","",time()-3600);
		setcookie("total",$total);	
		
	}
	
}
exit("<script>location.href='$referer'</script>");
}
else
{
	exit("<script>location.href='login.php'</script>");
}
?>
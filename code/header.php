<?php
$c = mysql_connect('localhost','root','');
$db = mysql_select_db('sassy3004');
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
<script src="js/jquery-1.11.3.min.js"> </script>
</head>

<body>
<div class="top-div">           
	<?php 
 	function loggedin()
 	{
		 	if (isset($_COOKIE['uid']) && !empty($_COOKIE['uid']))
			return $_COOKIE['uid'];
			else
			return false;
 	}
 
    if(!loggedin())
    {
    ?>
              <a class="button-top-div" href="login.php">  <input type="submit" class="button-order" value="Sign In" /> </a> 
			  <a class="button-top-div" href="signup.php "> <input type="submit" class="button-order" value="Sign Up" />  </a>
              <?php
				}
				else
				{
				$uid =$_COOKIE['uid'];
				$query="SELECT name from users where uid='$uid'";
				$result=mysql_query($query);
				$name=mysql_result($result,0,"name"); 
				echo $name;
				if($uid==1)
				{
				?>	
					&nbsp;
					<a class="button-top-div" href="add_product.php "> <input type="submit" class="button-order" value="Add Product" />  </a>
          			<a class="button-top-div" href="delete_product.php "> <input type="submit" class="button-order" value="Delete Product" />  </a>
            		<a class="login" href="logout.php "> <input type="submit" class="button-order" value="Sign Out" />  </a>
            	<?php	
				}
				else
				{
              ?>
                	&nbsp;&nbsp;<a class="button-top-div" href="order.php "> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="margin-right:2px color:white"></span></a>
					&nbsp;&nbsp;<a class="button-top-div" href="update.php "> <input type="submit" class="button-order" value="Update Profile" />  </a>
            		<a class="login" href="logout.php "> <input type="submit" class="button-order" value="Sign Out" />  </a>
			<?php
				}
                }
                ?> 

</div> <br>
<marquee behavior="scroll"  direction="right" loop="100" >Free Shipping! Pay on delivery!  </marquee>
<h1><img src="logo.jpg" height="200" width="300" ></h1>
  <div class="wrap">
		  <ul class="navbar">
			 <li><a href="index.php">Home</a></li>
			 <li><a href="#">Jewellery</a>
				<ul>
				   <li><a href="products.php?cid=1">Earings/Earcuffs</a></li>
				   <li><a href="products.php?cid=2">Rings</a></li>
				   <li><a href="products.php?cid=3">Necklace</a></li>
                   <li><a href="products.php?cid=4">Anklets/Bracelets</a></li>

				</ul>         
			 </li>
			 <li><a href="#">Shoes</a>
				<ul>
				   <li><a href="products.php?cid=5" >Boots</a></li>
				   <li><a href="products.php?cid=6">Heels</a></li>
				   <li><a href="products.php?cid=7">Flats</a></li>
				</ul>         
			 </li>
			 <li><a href="#">Bags</a>
				<ul>
				   <li><a href="products.php?cid=8">Backpacks</a></li>
				   <li><a href="products.php?cid=9">Clutches</a></li>
                   <li><a href="products.php?cid=10">Slings/Totes</a></li>
  				</ul>         
			 </li>
   </div>
<br>

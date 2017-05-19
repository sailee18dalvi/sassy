<?php
require_once("header.php");
?>

<br>
<?php
$msg="";
  if (isset($_POST['pid']))
  {
    $pid=$_POST['pid'];
   if(!empty($pid))
  {
        $query = "UPDATE products SET qty = '0' WHERE pid = $pid";
        echo $query;  
        echo md5('shoppingweb');
        $result = mysql_query($query); 
    
  }
  else{
    $msg="Enter product id";
  }

  
  }

?>

<div class="container">
	<div class="panel panel-default panel-danger">
		<div class="panel-heading ">
    		<strong>Delete Product</strong>
  		</div>
  		<div class="panel-body">
    	 <form class="form-horizontal" action="delete_product.php" method="POST">
  <fieldset>
  

    <div class="row">
      <label class="col-lg-3"  for="pid">Product ID</label>
      <div class="controls col-lg-6">
         <input type="pid" class="form-control" name="pid" placeholder='Enter product id'>
      </div>
    </div>
    <br>
  
      
    <br>
    <div class="row">
      <div class="reg">
         <input type="submit" class="button-order" value="Delete Product" /><?php echo "    ".$msg;?>
    </div>
    
</div>
</div>
</div>
</fieldset>
</form>
</div>

<br>
<br>
<?php
require_once("footer.php");
?>
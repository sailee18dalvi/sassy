<?php
require_once("header.php");
?>

<br>
<?php
$msg="";
  if (isset($_POST['pname']) && isset($_POST['price']) && isset($_POST['qty'])&& isset($_POST['cid']) )
  {
    $name=$_POST['pname'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $cid=$_POST['cid'];
   if(!empty($name) &&!empty($price) &&!empty($qty) &&!empty($cid))
  {
                          $query = "INSERT into products (name,price,qty,cid) values              
                        (\"$name\",\"$price\",\"$qty\",\"$cid\")"; 
                        $result = mysql_query($query);
                 exit("<script>location.href = 'index.php'</script>");
    
  }
  else{
    $msg="All fields are necessary";
  }

  
  }

?>

<div class="container">
	<div class="panel panel-default panel-danger">
		<div class="panel-heading ">
    		<strong>Add Product</strong>
  		</div>
  		<div class="panel-body">
    	 <form class="form-horizontal" action="add_product.php" method="POST">
  <fieldset>
  

    <div class="row">
      <label class="col-lg-3"  for="pname">Product Name</label>
      <div class="controls col-lg-6">
        <input type="text" class="form-control" name="pname" placeholder='Enter product name' value=<?php if(isset($pname))echo "\"$pname\""; ?> >
      </div>
    </div>
    <br>
      <div class="row">
      <label class="col-lg-3" for="price">Price</label>
      <div class="controls col-lg-6">
        <input type="price" class="form-control" name="price" placeholder='Enter price' value=<?php if(isset($price))echo "\"$price\""; ?> >
      </div>
    </div>
    <br>
   	  <div class="row">
      <label class="col-lg-3" for="qty">Quantity</label>
      <div class="controls col-lg-6">
      	 <input type="qty" class="form-control" name="qty" placeholder='Enter quantity' value=<?php if(isset($qty))echo "\"$qty\""; ?>>
      </div>
    </div>
    <br>
    <div class="row">
      <label class="col-lg-3"  for="cid">Category ID</label>
      <div class="controls col-lg-6">
         <input type="cid" class="form-control" name="cid" placeholder='Enter category id'>
      </div>
    </div>
    <br>
  
      
    <br>
    <div class="row">
      <div class="reg">
         <input type="submit" class="button-order" value="Add Product" /><?php echo "    ".$msg;?>
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
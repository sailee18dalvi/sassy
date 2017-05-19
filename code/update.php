<?php
require_once("header.php");
?>
<?php
  $msg = "";
  if (isset($_POST['email'])&& isset($_POST['baddress']) && isset($_POST['saddress']) && isset($_POST['contactno']))
  {
	   echo "<script>alert(\"Im inside isset\")</script>";
  $email = $_POST['email'];
  $baddress=$_POST['baddress'];
  $saddress = $_POST['saddress'];
  $contactno = $_POST['contactno'];

 
	  if (!empty($email)  && !empty($baddress)&&!empty($saddress)&& !empty($contactno)) 
	 {
		 echo "<script>alert('Im inside update')</script>";
			$query = "UPDATE users SET email='$email',baddress='$baddress',saddress='$saddress', contactno='$contactno' WHERE uid='$uid'";	
	   		$result = mysql_query($query); 
			$msg="Successfully Updated!";
	  }
	  else
	  {
		  $msg="All fields are Compulsory";
	  }
	  							 exit("<script>location.href = 'update.php'</script>");

  }
?>
<script>
  $(document).ready(function()
  {
    $("#update_form").hide();
  	$("#update_save_button").click(function()
    {
      $("#saved").hide();
      $("#update_form").show();
      $("#update_save_button").html('Update');
      $("#update_save_button").click(function()
      {
        $("#update_form").submit();

      });
    });
 });
</script>
<div class="container">
<div class="panel panel-default panel-danger">
<div class="panel-heading "> <strong>Manage Profile</strong> </div>
<div class="panel-body" id="profile">
 <button id="update_save_button" class="button-order" ><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right:5px"></span> &nbsp;Edit &nbsp;</button>
  <br>
  <br>
  <?php
				$uid =$_COOKIE['uid'];
        		function fetch_user($uid,$colm)
				{
				
				$query="SELECT $colm from users where uid='$uid'";
				$result=mysql_query($query);
				return mysql_result($result,0,$colm); 
				}
				$name=fetch_user($uid,"name");
				$email=fetch_user($uid,"email");
				$baddress=fetch_user($uid,"baddress");
				$saddress=fetch_user($uid,"saddress");
				$contactno=fetch_user($uid,"contactno");		
		?>
  <div id="saved">
    <div class="row">
      <div class="col-md-3">Name</div>
      <div class="controls col-lg-6" id="name"><?php echo $name;?> </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3">E-mail</div>
      <div class="controls col-lg-6" id="email"><?php echo $email;?> </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3">Billing Address</div>
      <div class="controls col-lg-6" id="baddress"><?php echo $baddress;?> </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3">Shipping Address</div>
      <div class="controls col-lg-6" id="saddress"><?php echo $saddress;?> </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3">Contact No.</div>
      <div class="controls col-lg-6" id="contactno"><?php echo $contactno;?> </div>
    </div>
  </div>
<form action="update.php" method="POST" id="update_form">
<div class="row">
  <div class="col-md-3">Name</div>
  <div class="col-md-6" id="name"><?php echo "$name"; ?> </div>
</div>
<br>
<div class="row">
  <div class="col-md-3">E-mail</div>
  <div class="col-md-6" id="email">
    <input type="text" name="email" class="form-control" value=<?php echo "\"$email\""; ?> >
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-3">Billing Address</div>
  <div class="col-md-6" id="baddress">
    <textarea class="form-control" rows="3" name="baddress"><?php echo $baddress; ?></textarea>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-3">Shipping Address</div>
  <div class="col-md-6" id="saddress">
    <textarea class="form-control" rows="3" name="saddress"><?php echo $saddress; ?></textarea>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-3">Contact No.</div>
  <div class="col-md-6" id="contactno">
    <input type="text" name = "contactno" class="form-control" value=<?php echo "\"$contactno\""; ?>>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
<br>
<br>
<?php
require_once("footer.php");
?>
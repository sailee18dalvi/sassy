<?php
  require_once("header.php");
?>

<?php
  $msg="";
  if (isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
  {
    $email = mysql_real_escape_string($_POST['email']);
    $password = md5($_POST['password']);
    $query = "SELECT uid,name FROM users where email='$email' AND password='$password'";
    $result = mysql_query($query);
	  $result_num_rows = mysql_num_rows($result);
  }
  if (isset($result_num_rows) && isset($result))
  {
    if($result_num_rows==0)
      $msg =  "Invalid Email/Password";
    else
    {
      if(isset($_POST['remember_me']) && !empty($_POST['remember_me']) && $_POST['remember_me'] == "1")
      {
	
        $exp_time = time()+60*60*24*30;
      }
      else
      {
        $exp_time = 0;
      }
      setcookie("uid",mysql_result($result, 0,'uid'),$exp_time);
      exit("<script>location.href = 'index.php'</script>");

    }

  }
?>

<div class="container">
	<div class="panel panel-default panel-danger">
		<div class="panel-heading ">
    		<strong>Login</strong>
  	</div>
  	<div class="panel-body">
    	<form class="form-horizontal" action="login.php" method="POST">
        <fieldset>
        <div class="row">
          <label class="col-lg-3" for="email">E-mail</label>
          <div class="controls col-lg-6">
            <input type="email" class="form-control" name="email" placeholder='Email' value=<?php if(isset($email))echo "\"$email\""; ?> >
          </div>
        </div>
        <br>
   	    <div class="row">
          <label class="col-lg-3" for="password">Password</label>
          <div class="controls col-lg-6">
      	   <input type="password" class="form-control" name="password">
          </div>
        </div>
        <br >
        <div class="form-group">
        	  <div class="row">
              <label class="col-lg-3" for=""></label>
                <input type="checkbox" id="remember_me" name="remember_me" value="1">
                <label for="remember_me">Remember me</label>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="reg">
            <input type="submit" class="button-order" value="Sign In" /><?php echo "    ".$msg;?> 
        </div>
      </div>
      </fieldset>
    </form>
  </div>
</div>
<br>
<br>

<?php
	require_once("footer.php");
?>
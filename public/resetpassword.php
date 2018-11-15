<?php

if(htmlspecialchars($_GET['token'])){
    $token= trim(htmlspecialchars($_GET['token']));
    if(ValidMd5($token)){
        require_once '../includes/database.php';
        $token=$database->escape($token);
        $query="SELECT `request_id` FROM `password_reset_request` WHERE `token`='$token' AND `handled`=0 AND `expiry_date`>CURRENT_DATE";
        $result=$database->query($query);
        if($database->numRows($result)>0){
            ?>
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../styles/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="../styles/sweetalert.css"/>
    </head>
    <body>
        <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">        <br><br><br><br>

            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">                
                  <h2 class="text-center">Reset Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
                    <form id="resetpassform" role="form" autocomplete="off" class="form" method="post">
                      <div class="form-group">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="passowrd"/>
                        
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="passconf" id="passconf" placeholder="password confirmation"/>
                      </div>
                        <button type="button" class="btn btn-primary" id="resetpassbutton">Change Password</button>
                      
                       <div class="form-group">
                           <input type="text" name="token" hidden="hidden" value="<?php echo $token;?>"/>
                    </div>
                      </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

     
        <script src="../scripts/jquery.js"></script>
        <script src="../scripts/bootstrap.js"></script>
        <script src="../scripts/sweetalert.min.js"></script>
       <script src="../scripts/resetpassword.js"></script>
    </body>
</html>
<?php
        }
        else{
            echo "The token is either wrong or has expired.<br/>You'll be redirected to the main index file in 5 seconds<br/>ask for another reset";
            echo "<script>setTimeout(function () {window.location.href='index.php';}, 5000);</script>";
        }
    }
    else{redirect();}
}
else{redirect();}

function ValidMd5($md5)
{
    return preg_match('/^[a-f0-9]{32}$/', $md5);
}
function redirect(){
    header("Location: index.php");
}
?>
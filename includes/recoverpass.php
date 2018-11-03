<?php
 require_once('database.php');
$id="";
$email="";



    $email = $database->escape($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate that is email form address
    {
        $message =  "Invalid email address please type a valid email!!";
        echo $message;
    }
    else
    {
        $query="SELECT userid FROM users where email='".$email."'";
      $result=  $database->query( $query);
       
        $Results = $database->fetchArray($result);

        if(count($Results)>=1)
        {
            $id = $Results['userid'];
            $message = "Your password reset link send to your e-mail address.";
            $to=$email;
            $subject="Forget Password";
            $from = 'easy@trade.com';
            $body='Hi, <br/> <br/>Your Membership ID is '.$Results['userid'].' <br><br>Click here to reset your password C:\xampp\htdocs\php\Project\includes\reset.php?encrypt='.$id.'&action=reset   <br/> <br/>--<br>C:\xampp\htdocs\php\Project\public\help.php<br>Solve your problems.';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$body,$headers);
        }
        else
        {
            $message = "Account not found please signup now!!";
            echo $message;
        }
    }

?>







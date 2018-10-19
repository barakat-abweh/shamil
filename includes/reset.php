<?php

include('database.php');
if (isset($_GET['action'])) {

    if ($_GET['action'] == "reset") {
        if (isset($_GET['id']) && !isEmpty($_GET['id']) && checkId($_GET['id'])) {
            $id = $database->escape($_GET['id']);
            $query = "SELECT id FROM users where id='" . $id . "'";
            $result = $database->query($query);
            $Results = $database->fetchArray($result);

            if (count($Results) >= 1) {
                echo '
            <html>
            <body>
 <form action="reset.php" method="post" id="reset">
    <p><input id="password" name="password" placeholder="Enter new password" type="password">
    </p><p><input id="password2" name="password2" placeholder="Re-type new password" type="password">
    <input name="action" value="$id" type="hidden"></p>
    <p><input value="Reset Password" onclick="mypasswordmatch();" type="button"></p>
  </form>
  <script>
function mypasswordmatch()
{
    var pass1 = $("#password").val();
    var pass2 = $("#password2").val();
    if (pass1 != pass2)
    {
        alert("Passwords do not match");
        return false;
    }
    else
    {
        $( "#reset" ).submit();
    }
}
</script>
</body>
</html>';
            } else {
                $message = 'Invalid key please try again. <a href="">Forget Password?</a>';
            }
        }
    }
} elseif (isset($_POST['action'])) {

    $id = $database->escape($_POST['action']);
    $password = $database->escape($_POST['password']);
    $query = "SELECT id FROM users where id='" . $id . "'";

    $result = query($query);
    $Results = $database->fetchArray($result);
    if (count($Results) >= 1) {
        $password = md5($password);
        $password = sha1($password);
        $query = "update users set password='" . $password . "' where id='" . $Results['id'] . "'";
        mysqli_query($connection, $query);

        $message = "Your password changed sucessfully .";
        echo $message;
    } else {
        $message = 'Invalid key please try again. ';
        echo $message;
    }
} else {
    header("location: /php/project/includes/reset.php");
}
?>

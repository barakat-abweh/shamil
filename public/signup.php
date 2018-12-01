<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="../styles/normalize.css" type="text/css" rel="stylesheet"/>
        <link href="../styles/bootstrap.css" type="text/css" rel="stylesheet" />
        <link href="../styles/sweetalert.css" type="text/css" rel="stylesheet"/>
        <link href="../styles/signup_page.css" type="text/css" rel="stylesheet"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Web2 porject:XHTML1.0 Strict with HTML-Kit" />
        <title>Sign Up now and make your acount</title>
    </head>
    <body>
       <?php
       $db;
       require_once '../includes/database.php';
       if(isset($database)){
           $db=$database;
        require_once '../includes/session.php';
        if ($session->isLoggedIn()) {
            require_once '../includes/users.php';
            $user->setDataBase($db);
            $user->setId($session->getUserId());
            redirectTo("home.php");
        }
       }
        function redirectTo($page) {#redirect  page
            header("Location: $page");
        }
        ?>
        <div class="signup col-md-8 col-md-offset-2">   

            <h2 class="border">Sign Up</h2>
            <b>Already have an account?<a href="index.php"> sign in now</a></b>
            <form class="form col-md-offset-2"  action="#" method="POST" id="signup">
                <fieldset class="form-group col-md-5">
                    <label for="fname" class="control-label">First Name<span class="glyphicon glyphicon-asterisk"></span></label>
                    <input  id="fname" name="fname" class="form-control " type="text"  maxlength="20" placeholder="first name" autofocus />
                </fieldset>
                <fieldset class="form-group col-md-5">
                    <label for="lname" class="control-label">Last Name<span class="glyphicon glyphicon-asterisk"></span></label>
                    <input id="lname" name="lname" class="form-control " maxlength="20" type="text" placeholder="last name"/>
                </fieldset>
                <fieldset class="form-group col-md-5">
                    <label for="uname" class="control-label">User Name<span class="glyphicon glyphicon-asterisk"></span></label>
                    <input id="uname" name="uname" class="form-control " maxlength="20" type="text" placeholder="User name"/>
                </fieldset>

                <fieldset class="form-group col-md-5">
                    <label for="email"  class="control-label">Email<span class="glyphicon glyphicon-asterisk"></span></label>
                    <input id="email" maxlength="32" name="email"  class="form-control" type="text"  placeholder="Email" />
                </fieldset>
                <fieldset class="form-group col-md-5">
                    <label for="phone1" class="control-label">Phone number<span class="glyphicon glyphicon-asterisk"></span></label>
                    <input class="form-control "  name="phone1" id="phone1"  minlength="10" maxlength="10" type="text" placeholder="Phone number" />
                </fieldset>
                
                  <fieldset class="form-group col-md-5">
                    <label for="phone2" class="control-label">Phone number</label>
                    <input class="form-control "  name="phone2" id="phone2"  minlength="10" maxlength="10" type="text" placeholder="Phone number" />
                </fieldset>
    
                <fieldset class="form-group col-md-5">
                    <label for="password" class="control-label">Password<span class="glyphicon glyphicon-asterisk"></span></label>
                    <input class="form-control"  maxlength="64" id="password" type="password" name="password" placeholder="password"/>
                </fieldset>
                <fieldset class="form-group col-md-5">
                    <label for="confpassword" class="control-label">Confirm password<span class="glyphicon glyphicon-asterisk"></span></label>
                    <input class="form-control" maxlength="64" id="confpassword" type="password" name="confpassword" placeholder="Confirm Password"/>
                </fieldset>
                
                <fieldset class="form-group col-md-5">
                    <select name="type" id="type" class="button btn btn-primary form-control">
                        <option>account type</option>
                        <option>Seller</option>
                        <option>Buyer</option>
                    </select>
                </fieldset>
                

                   <fieldset class="form-group col-md-5">
                       <select name="country" id="country" class="button btn btn-primary form-control" onchange="getCity()">
                       <option>choose country</option>
                        <?php
                        if(isset($db)){
                            $query="SELECT `country_id`, `country_name` FROM `country`";
                            $res=$db->query($query);
                            while($result=$db->fetchArray($res)){
                                echo "<option id=".$result['country_id'].">".$result['country_name']."</option>";
                            }
                        }
                        ?>
                    </select>
                </fieldset>
                
                
                <fieldset class="form-group col-md-5">
                    <select name="city" id="city" class="button btn btn-primary form-control">
                        <option>choose city</option>
                    </select>
                </fieldset>
                        
                <fieldset class="form-group col-md-5"><input class="button btn btn-success form-control " value="Sign up" id="register" type="button" /></fieldset>
            </form></div>
        <script src="../scripts/jquery.js" type="text/javascript"></script> 
        <script src="../scripts/bootstrap.js" type="text/javascript"></script>
        <script src="../scripts/sweetalert.min.js" type="text/javascript"></script>
        <script src="../scripts/signup.js" type="text/javascript"></script>
</body>
</html>

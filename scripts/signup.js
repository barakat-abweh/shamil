$document.ready(function(){
 //function convert charchter to Ascii Number
function ascii (a) { return a.charCodeAt(0); }

function checkNum($value) {
    $arr = $value.split("");
    for ($i = 0; $i<$arr.length; $i++) {
        $as = ascii($arr[$i]); 
        if ($as < 48 || $as > 57)
            return false;
    }
    return true;
}

function checkChar($value) { 
    $arr = $value.split("");

    for ($i = 0; $i<$arr.length; $i++) {
               $as = ascii($arr[$i]); 
        if ($as == 32)
            continue;//if value = space
        else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122))
            continue;
        else
            return false;
    }
    return true;
}

    function checkEmail($param) {
        $status = false;
        if ($param.val().indexOf('@') >= 0 && $param.val().indexOf('.') >= 0)
            $status = true;
        if ($status) {
            $split = $param.val().split('.');
            if ($split[$split.length - 1] === 'com')
                return $status;
        }
        return false;
    }


    $("#Submit").click(function () {
        $fname = false;
        $lname = false;
        $ID = false;
        $pass = false;
        $conpass = false;
        $email = false;
        $type = false;
        if (!checkChar( $("#fname").val()) || $("#fname").val().length < 4 || $("#fname").val().length > 20) {
            sweetAlert("Oops...", "First name must be at least 4 characters, no special characters allowed", "error");
        } else {
            $fname = true;

        }
        if ((!checkChar($("#lname").val()) || $("#lname").val().length < 4 || $("#lname").val().length > 20) && $fname) {
            sweetAlert("Oops...", "Last name must be at least 4 characters, no special characters allowed", "error");
        } else {
            $lname = true;
        }
        if ((!checkEmail($('#email')) || $('#email').val().length > 32) && $fname && $lname) {
            sweetAlert("Oops...", "Invalid email address", "error");
        } else {
            $email = true;
        }

        if ((!checkNum($('#ID').val()) || $('#ID').val().length < 8 || $('#ID').val().length > 10) && $fname && $lname && $email) {
            sweetAlert("Oops...", "ID must be 8 characters, no special characters allowed", "error");
        } else {
            $ID = true;
        }
        if (($('#password').val().length < 8 || $('#password').val().length > 40) && $fname && $lname && $email && $ID) {
            sweetAlert("Oops...", "Password must be 8 characters.", "error");
        } else {
            $pass = true;
        }
        if ($('#confpassword').val() !== $('#password').val() && $pass && $fname && $lname && $email && $ID) {
            sweetAlert("Oops...", "Password confirmation doesn't match the password.", "error");
        } else {
            $conpass = true;
        }


        if ($("#type").val() == "choose type" && $fname && $lname && $ID && $pass && $email && $conpass) {
            swal("Define your type!", "importer or trader");
        } else {
            $type = true;
        }

        if ($fname && $lname && $ID && $pass && $conpass && $type && $email) {

            swal("You signed sp successfuly!", "We hope you well be happy with us!", "success");

            setTimeout(function () {
                $("#formMore").attr("action", "../includes/signupval.php");
                $("#formMore").submit();
            }, 1000);


        } else {
            e.preventDefault();
        }

    });


});
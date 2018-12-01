function getCity(){
      $country_id=$('#country').find('option:selected').attr('id');
      $.post("../includes/getcities.php",
    {
        country_id:$country_id
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
            $('#city').html(data);
        }
    });
    }

$(document).ready(function(){ 
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
            if ($split[$split.length - 1] === 'com'||$split[$split.length - 1] === 'edu'||$split[$split.length - 1] === 'org'||$split[$split.length - 1] === 'ps'||$split[$split.length - 1] === 'jo'||$split[$split.length - 1] === 'net')
                return $status;
        }
        return false;
    }


    $("#register").click(function () {
        $fname = false;
        $lname = false;
        $uname = false;
        $email = false;
        $phone1 = false;
        $type = false;
        $country = false;
        $city = false;
        $pass = false;
        $conpass = false;
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
        if ((!checkChar($("#uname").val()) || $("#uname").val().length < 4 || $("#uname").val().length > 20) && $fname&&$lname) {
            sweetAlert("Oops...", "User name must be at least 4 characters, no special characters allowed", "error");
        } else {
            $uname = true;
        }
        if ((!checkEmail($('#email')) || $('#email').val().length > 32) && $fname && $lname && $uname) {
            sweetAlert("Oops...", "Invalid email address", "error");
        } else {
            $email = true;
        }
        if((!checkNum($('#phone1').val()) || $('#phone1').val().length!=10) && $fname && $lname && $uname && $email){
            sweetAlert("Oops...", "Phone number1 must be 10 digits,only digits allowed", "error");
        } else{
            $phone1=true;
        }
        if (($('#password').val().length < 8 || $('#password').val().length > 40) &&$fname&&$lname&&$uname&&$email&&$phone1) {
            sweetAlert("Oops...", "Password must be at least 8 characters.", "error");
        } else {
            $pass = true;
        }
        if ($('#confpassword').val() != $('#password').val() &&$fname&&$lname&&$uname&&$email&&$phone1&&$pass) {
            sweetAlert("Oops...", "Password confirmation doesn't match the password.", "error");
        } else {
            $conpass = true;
        }
        if ($("#type").val() == "choose type" &&$fname&&$lname&&$uname&&$email&&$phone1&&$pass&&$conpass) {
            swal("Define your type!", "seller or buyer");
        } else {
            $type = true;
        }
        if ($("#country").val() == "choose country" &&$fname&&$lname&&$uname&&$email&&$phone1&&$pass&&$conpass&&$type) {
            swal("Choose your country!", "");
        } else {
            $country = true;
        }
        if ($("#city").val() == "choose city" &&$fname&&$lname&&$uname&&$email&&$phone1&&$pass&&$conpass&&$type&&$country) {
            swal("Choose your city!", "");
        } else {
            $city = true;
        }
        if ($fname && $lname && $uname && $email && $phone1 && $type && $country && $city && $pass && $conpass) {

            swal("You signed sp successfuly!", "We hope you well be happy with us!", "success");

            setTimeout(function () {
                $("#signup").attr("action", "../includes/signupval.php");
                $("#signup").submit();
            }, 1000);


        } else {
            e.preventDefault();
        }
    });
});

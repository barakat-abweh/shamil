$(document).ready(function () {
    $('#signUp').click(
            function () {
                window.location.href = 'signup.php';
            }
    );
    //function convert charchter to Ascii Number
    function ascii(a) {
        return a.charCodeAt(0);
    }

    function checkNum($value) {
        $arr = $value.split("");
        for ($i = 0; $i < $arr.length; $i++) {
            $as = ascii($arr[$i]);
            if ($as < 48 || $as > 57)
                return false;
        }
        return true;
    }

    $('#signIn').click(function (e) {
        $ID = false;
        $pass = false;
        if (!checkNum($('#ID').val()) || $('#ID').val().length < 8 || $('#ID').val().length > 11) {
            sweetAlert("Oops...", "ID must be 8 characters, no special characters allowed", "error");
        } else {
            $ID = true;
        }
        if (($('#password').val().length < 8 || $('#password').val().length > 24) && $ID) {
            sweetAlert("Oops...", "Password must be at least 8 characters.", "error");
        } else {
            $pass = true;
        }
        if ($ID && $pass) {
            $('#signin').attr('action', '../includes/signinVal.php');
            $('#signin').submit();
        } else {
            e.preventDefault();
        }
    });
});
$(document).ready(function () {
    $('#skip').click(
            function () {
                window.location.href = "../public/index.php";
            });
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

    function checkChar($value) {
        $arr = $value.split("");
        for ($i = 0; $i < $arr.length; $i++) {
            $as = ascii($arr[$i]);
            if ($as == 32)
                continue; //if value = space
            else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122))
                continue;
            else
                return false;
        }
        return true;
    }


    $('#container').css('height', $(window).height());
    function checkEmail($param) {
        $status = false;
        if ($param.val().indexOf('@') >= 0 && $param.val().indexOf('.') >= 0)
            $status = true;
        if ($status) {
            $split = $param.val().split('.');
            if ($split[$split.length - 1] == 'com')
                return $status;
        }
        return false;
    }


    function checkNum_Char($value) {
      
        $arr = $value.split("");
        for ($i = 0; $i < $arr.length; $i++) {
            $as = ascii($arr[$i]); //Return the ASCII value of character
            if ($as === 32)
                continue;
            else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122) || ($as >= 48 && $as <= 57))
                continue;
            else
                return false;
        }
        return true;
    }


    $('#save').click(function (e) {
        $username = false;
        $address = false;
        $companyname = false;
        $companytype = false;
        $phone = false;
        $bio = false;
        if (!checkNum_Char($('#username').val()) ||  $('#username').val().length > 20) {
            sweetAlert("Oops...", "Username no special characters allowed", "error");
        } else {
            $username = true;
        }
        if ((!checkNum_Char($('#address').val())  || $('#address').val().length > 20) && $username) {
            sweetAlert("Oops...", "Address must be at least 6 characters, no special characters allowed", "error");
        } else {
            $address = true;
        }
        if ((!checkNum_Char($('#companyName').val()) || $('#companyName').val().length > 20) && $username && $address) {
            sweetAlert("Oops...", "Company name must be at least 6 characters, no special characters allowed", "error");
        } else {
            $companyname = true;
        }
        if ((!checkNum($('#phone').val()) ) && $username && $address && $companyname) {
            sweetAlert("Oops...", "phone must be at least 10 digits, no special characters allowed", "error");
        } else {
            $phone = true;
        }
        if ((!checkChar($('#companytype').val())  || $('#companytype').val().length > 10) && $username && $address && $companyname && $phone) {
            sweetAlert("Oops...", "Company type must be at least 3 charachters, no number , special characters allowed", "error");
        } else {
            $companytype = true;
        }
        if (($('#moreDetails').val().length > 1000) && $username && $address && $companyname && $phone && $companytype) {
            sweetAlert("Oops...", "bio must be at least 3 charachters, no special characters allowed", "error");
        } else {
            $bio = true;
        }

        if ($username && $address && $companyname && $companytype && $phone && $bio) {
            $('#formMore').submit();
            
        } else {
            e.preventDefault();
        }
    });
});

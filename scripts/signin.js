$(document).ready(function () {
    $('#signup').click(
            function () {
                window.location.href = 'signup.php';
            }
    );
    //function convert charchter to Ascii Number
    function ascii(a) {
        return a.charCodeAt(0);
    }

    $('#wrapper').css('height', $(window).height());

    
    
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

    $('#signin').click(function (e) {
        $email = false;
        $pass = false;
        if (!checkEmail($('#email'))) {
            sweetAlert("Oops...", "Enter a correct email", "error");
        } else {
            $email = true;
        }
        if ($('#password').val().length < 8 && $email) {
            sweetAlert("Oops...", "Password must be at least 8 characters.", "error");
        } else {
            $pass = true;
        }
        if ($email && $pass) {
            swal("You signed in successfuly!", "We hope you well be happy with us!", "success");
            setTimeout(function () {
            $('#signinform').attr('action', '../includes/signinVal.php');
            $('#signinform').submit();
            }, 1000);
        } else {
            e.preventDefault();
            //location.reload(true);
        }
    });
});
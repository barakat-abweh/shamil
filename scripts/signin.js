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

    $('#resetpass').click(function (){
        $email=$('#exampleInputEmail1');
        if(!checkEmail($email)||$email.length==0){
            sweetAlert("Oops...", "Enter your email", "error");
        }
        else{
            swal("You'll receive a reset link if this email was right!", "Kindly check your email to see the link!", "success");
           $.post("../includes/resetpassword.php",
    {
        email:$email.val()
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
            location.reload();
        }
    });
        }
    });
});
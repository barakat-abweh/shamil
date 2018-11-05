/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function (){
    $('#resetpassbutton').click(function (){
        $pass=$('#pass').val();
        $confpass=$('#passconf').val();
        if($pass.length>=8&&$pass.length<=40&&$pass===$confpass){
            $("#resetpassform").attr("action", "../includes/changepassword.php");
                $("#resetpassform").submit();
        }
        else{
           sweetAlert("Oops...", "Password must be at least 8 characters amd password confirmation must be the same as password", "error");
        }
    });
});



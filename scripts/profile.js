$(document).ready(function (){
    setInterval(function(){$.post("../includes/notification.php",
    {
        lastinterestid:"0"
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, We can't get your notifications", "error");
        }
        else{
    alert(data);
        }
    });},5000);
    
});
function editProfile(){
    $('#editprofile').attr('disabled','');
    $('#editdiv').append("<button type=\"button\" class=\"col-md-3 col-md-offset-1 btn btn-danger col-xs-offset-1 col-xs-3\" id=\"cancel\" onclick=\"cancel();\">Cancel</button><button type=\"button\" class=\"col-md-3 col-md-offset-1 btn btn-success col-xs-offset-1 col-xs-3\" id=\"save\" onclick=\"save();\">Save</button>");
   $fname = $('#fname');
   $lname = $('#lname');
   $uname = $('#uname');
   $phone = $('#phone');
   $email = $('#email');
   $address = $('#address');
  $fname.replaceWith("<input type='text' class='form-control' id='fname' value='" + $fname.text() +"'>");
  $lname.replaceWith("<input type='text' class='form-control' id='lname' value='" + $lname.text() +"'>");
   $uname.replaceWith("<input type='text' class='form-control' id='uname' value='" + $uname.text() +"'>");
   $email.replaceWith("<input type='text' class='form-control' id='email' value='" + $email.text() +"'>");
   $phone.replaceWith("<input type='text' class='form-control' id='phone' value='" + $phone.text() +"'>");
    $.post("../includes/getcitiess.php",
    {
        x:"0"
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
    $address.replaceWith("<select class='form-control' id='address'>"+data+"</select>");
        }
    });
}
function cancel() {
window.location.href=location.href; 
}
function save(){
$password=prompt("Enter your password!");
    $fname = $('#fname').val();
    $lname = $('#lname').val();
    $uname = $('#uname').val();
    $phones = $('#phone').val();
    $phone1=$phones.split("/")[0];
    $phone2=$phones.split("/")[1];
    $email = $('#email').val();
    $address = $('#address').val();
    $.post("../includes/edituser.php",
    {
        fname:$fname,lname:$lname,uname:$uname,phone1:$phone1,phone2:$phone2,email:$email,address:$address,password:$password
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
           location.href=window.location.href;
        }
    });
}

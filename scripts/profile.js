var x=0;
function editProfile(){
    $('#editprofile').attr('disabled','');
    $('#editdiv').append("<button type=\"button\" class=\"col-md-3 col-md-offset-1 btn btn-danger col-xs-offset-1 col-xs-3\" id=\"cancel\" onclick=\"cancel();\">Cancel</button><button type=\"button\" class=\"col-md-3 col-md-offset-1 btn btn-success col-xs-offset-1 col-xs-3\" id=\"save\" onclick=\"save();\">Save</button>");
   $fname = $('#fname');
   $lname = $('#lname');
   $uname = $('#uname');
   $phone = $('#phone');
   $email = $('#email');
   $address = $('#address');
  $fname.replaceWith("<input type='text' class='form-control-edit edit_info' id='fname' value='" + $fname.text() +"'>");
  $lname.replaceWith("<input type='text' class='form-control-edit edit_info' id='lname' value='" + $lname.text() +"'>");
   $uname.replaceWith("<input type='text' class='form-control-edit edit_info' id='uname' value='" + $uname.text() +"'>");
   $email.replaceWith("<input type='text' class='form-control-edit edit_info' id='email' value='" + $email.text() +"'>");
   $phone.replaceWith("<input type='text' class='form-control-edit edit_info' id='phone' value='" + $phone.text() +"'>");
    $.post("../includes/getcitiess.php",
    {
        x:"0"
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
    $address.replaceWith("<select class='form-control-edit edit_info' id='address'>"+data+"</select>");
        }
    });
}

function cancel() {
window.location.href=location.href; 
}

function save(){
(async function getPassword () {
const {value: password} = await swal({
  title: 'Enter your password',
  input: 'password',
  inputPlaceholder: 'Enter your password',
  inputAttributes: {
    minlength: 10,
    maxlength:40,
    autocapitalize: 'off',
    autocorrect: 'off'
  }
})

if (password) {
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
        fname:$fname,lname:$lname,uname:$uname,phone1:$phone1,phone2:$phone2,email:$email,address:$address,password:password
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
})()
}

function accept(e){
    $.post("../includes/accept.php",
    {
        interestid:e
    },
           
    function(data, status){

        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
    });
}
function reject(e){
    $.post("../includes/reject.php",
    {
        interestid:e
    },
           
    function(data, status){

        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
    });
}
function initmessage(e){
    $.post("../includes/initmessage.php",
    {
        interestid:e
    },
           
    function(data, status){

        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
    });
}


function getMessages(e){
    x=e;
setInterval(function (){
    $.post("../includes/getmessages.php",
    {
        id:x
    },
   //        
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        $messagesbody=$('#messagesbody');
        $messagesbody.html(data);
    });},1000);
}
function sendMessage(){
    $mes=$('#writem').val();
$.post("../includes/sendmessage.php",
    {
        id:x,mes:$mes
    },
           
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
    });
}
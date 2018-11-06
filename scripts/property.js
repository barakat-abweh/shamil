function changepic(e){
document.getElementById("pic-1").src =e ;
}
function interested(e){
    $.post("../includes/interested.php",
    {
        property_id:e
    },
    function(data, status){
        if(data=='0'|| status!="success"){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
             alert(data);
        }
});
}


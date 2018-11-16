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
            location.href=window.location.href;
        }
});
}
function unInterested(e){
    $.post("../includes/unInterested.php",
    {
        property_id:e
    },
    function(data, status){
        if(data=='0'|| status!="success"){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
            location.href=window.location.href;
        }
});
}
function editProperty(e){
    alert(e);
}
function deleteProperty(e){
      $.post("../includes/deleteProperty.php",
    {
        property_id:e
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

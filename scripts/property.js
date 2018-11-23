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
function editProperty(){
    $('#editproperty').attr('disabled','');
    $name = $('#propname');
    $desc = $('#desc');
    $addr = $('#addr');
    $type = $('#type');
    $area = $('#area');
    $price = $('#price');
    $name.replaceWith("<input type='text' class='form-control' id='propname' value='" + $name.text() +"' name='propname'>");
    $desc.replaceWith("<textarea id='desc' name='desc'>"+$desc.text()+"</textarea>");
    $area.replaceWith("<input type='text' class='form-control' id='area' value='" + $area.text() +"'>");
    $price.replaceWith("<input type='text' class='form-control' id='price' value='" + $price.text() +"'>");
    $('#propinfo').append("<div class='class='action col-xs-12'><button class='col-md-3 btn btn-danger' id='cancel' type='button' onclick='cancel()'>Cancel</button><button class='col-md-3 edit_property btn btn-success' id='save' type='button' onclick='save();'>Save</button></div>");
    document.getElementById('editproperty').style.visibility='hidden';
    document.getElementById('deleteproperty').style.visibility='hidden';
    $.post("../includes/getcitiess.php",
    {
        x:"0"
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
    $addr.replaceWith("<select class='form-control' id='addr'>"+data+"</select>");
        }
    });
    $.post("../includes/gettypes.php",
    {
        x:"0"
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
    $type.replaceWith("<select class='form-control' id='type'>"+data+"</select>");
        }
    });
}
function cancel() {
window.location.href=location.href; 
}
function save(){
    $propertyid=location.href.split('=')[1];
    $name = $('#propname').val();
    $desc = $('#desc').val();
    $addr = $('#addr').val();
    $type = $('#type').val();
    $area = $('#area').val();
    $price = $('#price').val();
    $.post("../includes/editproperty.php",
    {
        property_id:$propertyid,name:$name,description:$desc,address:$addr,type:$type,area:$area,price:$price
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
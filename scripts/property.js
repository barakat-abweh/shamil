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
    $own = $('#own');
    $addr = $('#addr');
    $type = $('#type');
    $area = $('#area');
    $price = $('#price');
    $name.replaceWith("<input type='text' class='form-control' id='propname' value='" + $name.text() +"' name='+propname'>");
    $desc.replaceWith("<textarea id='desc' value='" + $desc.text() +"' name='+desc'>");
    $own.replaceWith("<input type='text' class='form-control' id='own' value='" + $own.text() +"' name='+own'>");
    $addr.replaceWith("<input type='text' class='form-control' id='addr' value='" + $addr.text() +"' name='+addr'>");
    $type.replaceWith("<input type='text' class='form-control' id='type' value='" + $type.text() +"' name='+type'>");
    $area.replaceWith("<input type='text' class='form-control' id='area' value='" + $area.text() +"' name='+area'>");
    $price.replaceWith("<input type='text' class='form-control' id='price' value='" + $price.text() +"' name='+price'>");
    $('#propinfo').append("<button class='col-md-3  btn btn-warning' id='save' type='button' onclick='save();'>Save</button><button class='col-md-3 btn btn-danger' id='cancel' type='button' onclick='cancel()'>Cancel</button>");
    
}
function cancel() {
window.location.href=location.href; 
}
function save(){
    alert('1');
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
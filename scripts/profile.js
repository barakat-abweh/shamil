function editProfile(){
    $('#editprofile').attr('disabled','');
    $('#editdiv').append("<button type=\"button\" class=\"col-md-3 col-md-offset-3 btn btn-warning col-xs-offset-3 col-xs-3\" id=\"save\" onclick=\"save();\">Save</button><button type=\"button\" class=\"col-md-3 col-md-offset-1 btn btn-warning col-xs-offset-1 col-xs-3\" id=\"cancel\" onclick=\"cancel();\">Cancel</button>");
  /*  $name = $('#propname');
    $desc = $('#desc');
    $addr = $('#addr');
    $type = $('#type');
    $area = $('#area');
    $price = $('#price');
    $name.replaceWith("<input type='text' class='form-control' id='propname' value='" + $name.text() +"' name='propname'>");
    $desc.replaceWith("<textarea id='desc' name='desc'>"+$desc.text()+"</textarea>");
    $area.replaceWith("<input type='text' class='form-control' id='area' value='" + $area.text() +"'>");
    $price.replaceWith("<input type='text' class='form-control' id='price' value='" + $price.text() +"'>");
   // $('#propinfo').append("<button class='col-md-3  btn btn-warning' id='save' type='button' onclick='save();'>Save</button>");
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
    });*/
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

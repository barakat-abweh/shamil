function viewImage(link, x) {
    for (var i = 1; i <= 4; i++) {
        var cimg = document.getElementById("a" + i);
        if (i === x) {
            cimg.style.border = "3px ridge blue";
        } else {
            cimg.style.border = "";
        }

    }
    var image = document.getElementById("mImage");
    image.style.backgroundImage = link;

}

$(document).ready(function () {
    $('#a1').click(function () {
        viewImage($(this).css('background-image'), 1);
    });
    $('#a2').click(function () {
        viewImage($(this).css('background-image'), 2);
    });
    $('#a3').click(function () {
        viewImage($(this).css('background-image'), 3);
    });
    $('#a4').click(function () {
        viewImage($(this).css('background-image'), 4);
    });
    
    


});
function showDetails($id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../includes/ajax.php?id=' + $id, true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var obj = JSON.parse(xhr.responseText);
            document.getElementById('productName').innerText = obj.name;
            document.getElementById('price').innerText = obj.price;
            document.getElementById('offer').innerText = obj.offer;
            document.getElementById('date').innerText = obj.date;
            document.getElementById('moreDetVal').innerText = obj.more;
            document.getElementById('type').innerText = obj.type;
            document.getElementById('quantity').innerText = obj.quantity;
            document.getElementById('qrcode').src = obj.qrcode;
            document.getElementById("mImage").style.backgroundImage = "url(" + obj.img1 + ")";
            document.getElementById("a1").style.backgroundImage = "url(" + obj.img1 + ")";
            document.getElementById("a2").style.backgroundImage = "url(" + obj.img2 + ")";
            document.getElementById("a3").style.backgroundImage = "url(" + obj.img3 + ")";
            document.getElementById("a4").style.backgroundImage = "url(" + obj.img4 + ")";
           var path = window.location.pathname;
           var page = path.split("/").pop();
            if(page==="MyProfile.php"){    
                document.getElementById("qrcodeLink").href = obj.qrcode;
                 document.getElementById("remove").setAttribute("onclick", "javascript: deleteprdct(" + $id + ");");
                  document.getElementById("save").setAttribute("onclick", "javascript: editprdct(" + $id + ");");
       }
      else {document.getElementById("HideText").value=$id;

          //  var userid = obj.userid;
          

        }
    };

}
}

$start = 8;
$end = 16;
function showMore($id) {
    var xhr = new XMLHttpRequest();
   // alert($id);
    if($id===99)$target= '../includes/showMore.php?start=' + $start + '&end=' + $end; 
    else  $target='../includes/showMore.php?id=' + $id + '&start=' + $start + '&end=' + $end;
  //  alert($target);
    xhr.open('GET',$target, true);
    $r = 'id='.$id;
    xhr.send();
   xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var value = xhr.responseText;
            if (value == "")
                $('#showMore').fadeOut("slow");
            else {
                $('#thumbs').append(value);
                $('.div').show('slow').appendTo(".div").animate({height: "300px"});
                $start += 8;
                $end += 8;
            }

        }

    };
}



function deleteprdct($id){
    swal({title: "Delete Proudct", text: "Are you sure  to delete this product",
        type: "info", showCancelButton: true, closeOnConfirm: false, showLoaderOnConfirm: true },
    function () {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../includes/delete.php?id=' + $id,true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
               
            }
    };
        setTimeout(function () {
            swal("Delted is finished!");window.location.reload(true);
        }, 1000);
    });
}



$('#reserve').click(function(){Reserve();});
function Reserve() {
    $quantity = $('#resQuantity').val();
        $originalquantity = parseInt($('#quantity').text());
    if ($quantity<= 0 || $quantity>$originalquantity) {
        sweetAlert("Oops...", "reserved quantity must be larger than 0 and less than the available quantity, no characters allowed", "error");
    } else
        swal({title: "Reserve Proudct", text: "Are you sure  to reserve this product",
            type: "info", showCancelButton: true, closeOnConfirm: false, showLoaderOnConfirm: true},
                function () {
                    var xhr = new XMLHttpRequest();

                    $id = $('#HideText').val();
                    xhr.open('GET', '../includes/reservegood.php?id=' + $id + "&resQuantity=" + $quantity,true);
                    xhr.send();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {

                        }
                    };
                    setTimeout(function () {
                        swal("Reserve is ready!"); // window.location.href = window.location.href;
                    }, 1000);

                });
}
     
    

function editprdct(id) {
    var name = document.getElementById('productName').value;
    var price = document.getElementById('price').value;
    var offer = document.getElementById('offer').value;
    var type = document.getElementById('type').value;
    var textMoreDet = document.getElementById('textMoreDet').value;
    var quantity = document.getElementById('quantity').value;
    
    var xhr = new XMLHttpRequest();
    if(Save()){
    xhr.open('GET', '../includes/MyProFileVal.php?goodid='+ id +'&goodname=' +name+'&price=' + price + '&offer=' + offer + '&type=' + type + '&quantity=' + quantity + '&moredetails=' + textMoreDet,true);
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
       
        }

    };
   
    }
}



function Save(){
    $name = false;
        $price = false;
        $type = false;
        $quantity = false;
        $info = false;
        $offer = false;
     if ((!checkNum_Char($("#productName").val()) || $("#productName").val().length < 3 || $("#productName").val().length > 20)) {
            sweetAlert("Oops...", "Product Name must be at least 4 characters, no special characters allowed", "error");
            // alert("Product Name must be at least 4 characters, no special characters allowed");
        } else {
            $name = true;

        }
        if ((!checkNum_Char($("#type").val()) || $("#type").val().length < 3 || $("#type").val().length > 20)) {

            sweetAlert("Oops...", "Product type must be at least 4 characters, no special characters allowed", "error");
        } else {
            $type = true;

        }
        if ((!checkNum($("#price").val()) || $("#price").val().length < 1 || $("#price").val().length > 10) && $name && $type) {

            sweetAlert("Oops...", "Product price must be Numbers, no characters allowed", "error");
        } else {
            $price = true;

        }
        if ((!checkNum($("#offer").val()) || $("#offer").val()<0 || $("#offer").val() >= 100) && $name && $type && $price ) {

            sweetAlert("Oops...", "Product offer must be Numbers, no characters allowed , less than price", "error");
        } else {
            $offer = true;

        }
        if ((!checkNum($("#quantity").val()) || $("#quantity").val().length < 1 || $("#quantity").val().length > 10) && $name && $type && $price && $offer) {
            sweetAlert("Oops...", "Product quantity must be Numbers, no characters allowed", "error");
        } else {
            $quantity = true;

        }
        if (($("#textMoreDet").val().length < 1 || $("#textMoreDet").val().length > 300) && $name && $type && $price && $offer && $quantity) {

            sweetAlert("Oops...", "Product info have maximum 300 characters", "error");

        } else {
            $info = true;
        }
        if ($name && $type && $price && $offer && $quantity && $info) {
              Savea("type");
              Savea("quantity");
              Savea("parcode");
              Savea("textMoreDet");
              Savea("offer");
              Savea("price");
              Savea('productName');
             $('#save').attr('disabled', '');
              $('#edit').removeAttr('disabled');  
              
              return true;
            
        }
        else return false;
    
}

	function Savea(par){
  if (par === "type" || par === "quantity") {
   $('#' + par).replaceWith("<span class='RDetVal col-md-9' id='" + par +  "' >"+ $('#' + par).val() + "</span>"); }
   else if (par === "textMoreDet") {
        $('#' + par).replaceWith("<span class='col-md-12' id='moreDetVal' >"+ $('#' + par).val() + "</span>"); 
   }
   else if(par==='productName'){
    $('#' + par).replaceWith("<h4 class='modal-title' id='"+par+"'>"+ $('#' + par).val() + "</h4>");
   }
   else {
          $('#' + par).replaceWith("<span  id='"+par+"'>"+$('#' + par).val() + "</span>"); 
    
   }
   }
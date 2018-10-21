
$(document).ready(function (){
    
    $(document).scroll(function () {
        if (scrollY > 455) {
            $('#navprofile').hide('swing');
        }
        if (scrollY <= 455 && $(document).width() > 768) {
            $('#navprofile').show('swing');
           
           
        }
    });
    
    
   
    
  $('#Notificationsd').scroll(function(){
    //scrollTop refers to the top of the scroll position, which will be scrollHeight - offsetHeight
    if(this.scrollTop == (this.scrollHeight - this.offsetHeight)) {
     moreNotifications();
    }
  });

    
    $(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() === $(document).height()) { 
        showMore(99);
   }
});







    

var flag = true;
    $('#navprofile').click(
            function () {
                if (flag) {
                    $("#sidebar").show("swing");
                    $('#navprofile').animate({height: '50px', width: '50px'});
                    $('#user').hide("swing");
                    flag = false;
                } else {
                    $("#sidebar").hide("swing");
                    $('#navprofile').animate({height: '75px', width: '75px'});
                    $('#user').show("swing");
                    flag = true;

                }




            }
    );


/* Edit Detials Widnow */
    $('#edit').click(function () {
        $(this).attr('disabled', '');
        $('#save').removeAttr('disabled');
        Edit("type");
        Edit("quantity");
        Edit("parcode");
        Edit("offer");
        Edit("moreDetVal");
        Edit("price");
        Edit('productName');
    });



//    $('#save').click(function () {    
//     Save();
//    });

    $flag2=true;
 $('#Notfclick').click(function(){
    var x=0;
  if($flag2){var n1=setInterval(function(){x-=10;rotate(x);},10);$flag2=false;}
  else {var n2=setInterval(function(){x-=10;rotate2(x);}, 10);$flag2=true;}
 function rotate(x){$('#sidebar').css({"transform":"rotateY("+x+"deg)"});
    $('#Notifications').css({"transform":"rotateY("+x+"deg)"});
     $('.list-group').css({"transform":"rotateY("+x+"deg)"});
 if(x<=-180){clearInterval(n1);$('#Notificationsd').css({"z-index":"2"});
 $('#Notificationsd').fadeIn("speed");x=0;
     }
 
 }  
 
  function rotate2(x){$('#sidebar').css({"transform":"rotateY("+x+"deg)"});
       $('#Notifications').css({"transform":"rotateY("+x+"deg)"});
 if(x<=0){clearInterval(n2);$('#Notificationsd').css({"z-index":"0"});
 $('#Notificationsd').slideUp("speed");x=0;
     }
 
 }
 
 
 
 
 
 
 
 });
    
    
    
    
    
    
    
    

function Edit(par) {
    if (par === "type" || par === "quantity" || par === "parcode") {
        $('#' + par).replaceWith("<input type='text' class='form-control text' id='" + par + "' value='" + $('#' + par).text() +"' name='"+par+"'>");
    } else if (par === "moreDetVal") {
        $('#' + par).replaceWith("<textarea class='form-control' id='textMoreDet'" +"' name='"+par+ "'>" + $('#' + par).text()+ "</textarea>");
       
    } else {
        $('#' + par).replaceWith("<input type='text' class='form-control' id='" + par + "' value='" + $('#' + par).text()  +"' name='"+par+"'>");
    }

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
      
   







});








 function ascii(a) {
        return a.charCodeAt(0);
    }

   function checkNum($value) {
    $arr = $value.split("");
    for ($i = 0; $i<$arr.length; $i++) {
        $as = ascii($arr[$i]); 
        if ($as < 48 || $as > 57)
            return false;
    }
    return true;
}

    function checkChar($value) {

        $arr = $value.split("");

        for ($i = 0; $i < $arr.length; $i++) {
            $as = ascii($arr[$i]);
            if ($as === 32)
                continue;//if value = space
            else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122))
            {
                continue;
            } else
            {
                return false;
            }
        }
        return true;
    }

    function checkNum_Char($value) {
        $arr = $value.split("");
        for ($i = 0; $i < $arr.length; $i++) {
            $as = ascii($arr[$i]); //Return the ASCII value of character
            if ($as === 32)
                continue;
            else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122) || ($as >= 48 && $as <= 57))
                continue;
            else
                return false;

        }

        return true;
    }


/*  End Edit Detials Widnow */



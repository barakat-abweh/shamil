
    var n=setInterval(function(){getReserveID();},4000);
    var m=1;
    flag1st=true;
    var ReserveIDNew = new Array;
     var reserveid=0;
    function getReserveID(){
    var xhr = new XMLHttpRequest();
        xhr.open('GET', '../includes/Notification.php',open);
        xhr.send();
        xhr.onreadystatechange = function () {
             if (xhr.readyState === 4 && xhr.status === 200) {   
             if(xhr.responseText=="");
             else   reserveid=xhr.responseText;            
         if(flag1st && reserveid!=null){flag1st=false;
              ReserveIDNew.push(reserveid);
                }
            else{
                if(reserveid>ReserveIDNew[m-1]){
                    ReserveIDNew.push(reserveid);m++;                    
                 getNotifications(reserveid);
                swal("New Notifications");                
                }                         
                }                 
        }
    };  
    }
   
    function getNotifications($id){
    var xhr = new XMLHttpRequest();  
        xhr.open('GET', '../includes/NotifData.php?id='+$id);
        xhr.send();
        xhr.onload=function() {
             if (xhr.readyState === 4 && xhr.status === 200) {
                  var res = JSON.parse(xhr.responseText);  
                  var data2="<li class='list-group-item list-group-item-danger'>Trader ";
                  data2+="<a href='Profile.php?id="+res.traderid+"' id='TraderName'>"+res.trader+ "</a> ";
                  data2+="order quantity of "+res.quantity;
                  data2+=" good <a href='Product.php?goodid="+res.goodid+"' id='GoodName'> "+res.good+"</a>";
                  data2+="<br /><br />";
                  data2+="<button type='button' class='btn btn-primary btn-sm' onclick='accept("+res.reserveid+",1,event)'>Accept</button>&nbsp;&nbsp;&nbsp;";
                  data2+="<button type=x'button' class='btn btn-warning btn-sm' onclick='accept("+res.reserveid+",-1,event)'>Refusal</button><br />";
                  data2+="<small id='dealDate'>"+res.date+"</small>";
                  data2+="</li>";
                  $('.list-group').prepend(data2+"</br>");                       
                        }
    };
    }
    
    
    $start=11;$end=21;
    function moreNotifications(){
        var xhr = new XMLHttpRequest();        
        $target= '../includes/showMoreNotifc.php?start=' + $start + '&end=' + $end; 
         xhr.open('GET',$target, true);
         xhr.send();
         xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var value = xhr.responseText;
            //prompt("a",value);
            if (value == " ")
            {$('#moreNotification').fadeOut("slow");            
                 }
                
                 
            else {
                $('#NotificationList').append(value);
                //$('.div').show('slow').appendTo(".div").animate({height: "300px"});
                $start += 10;
                $end += 10;
            }

        }

    };   
}


    function accept($id,$r,e){
     var xhr = new XMLHttpRequest();
        xhr.open('GET', '../includes/accept.php?id='+$id+"&r="+$r);
        xhr.send();
        xhr.onload=function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                  $r=e.target.parentElement;
                  var $r=$($r);
                  $r.slideUp("linear");
                }           
        };   
    }
    
  
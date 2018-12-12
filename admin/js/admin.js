/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 function getUP(e){
        $.post("../includes/getup.php",
    {
        id:e
    },
           
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
             $('#table').html(data);
        }
    });
    }
    function deleteProperty(e){
        $.post("../includes/deleteproperty.php",
    {
        id:e
    },
           
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
          location.reload();
        }
    });
    }
    function udeleteProperty(e){
        $.post("../includes/udeleteproperty.php",
    {
        id:e
    },
           
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
          location.reload();
        }
    });
    }
    function accountDDAD(action,id){
        $.post("../includes/accountDDAD.php",
    {
        id:id,action:action
    },
           
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
          location.reload();
        }
    });
    }
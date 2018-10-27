
function adv_show(x){
    var vm;
    if(x==1)vm=true;
    else vm=false;
      //Users
   $('#adv_address').prop('disabled',!vm);
   $('#adv_compname').prop('disabled',!vm);
   $('#adv_phone').prop('disabled',!vm);
   $('#adv_comptype').prop('disabled',!vm);
   //Goods
   $('#adv-goodtype').prop('disabled',vm);
   $('#adv_minprice').prop('disabled',vm);
   $('#adv_maxprice').prop('disabled',vm);
      
  }
    
    

    <div class="container bootstrap snippet">
        <div class="row">
            
            <?php
           if($ownprofile){
            require_once('profilepicture.php');}
            else{
    require_once './profilepicturewithoutbutton.php';
            }
            ?>
                <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active "><a data-toggle="tab" href="#home"><h4 class="hover_tabe">Information</h4></a></li>
           
                
                <?php if($ownprofile){
     require_once './tabsprofileseller.php';
                }
?>
            
                    
                    
                    </ul>
          <div class="tab-content">
            <div class="tab-pane active " id="home"> 
<!-- ******************************************************** First Name **********************************************-->             
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="password" id="first_name" class="label_info"><h4>First Name</h4></label>
                            <h4><span class="badge badge-warning information1"><span class="information" id="fname"><?php echo $user->getFname();?></span></span></h4>
                          </div>
                      </div>
<!-- ******************************************************** Last Name **********************************************-->              
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="password" id="user_name"  class="label_info"><h4> Last Name</h4></label>
                              <h4><span class="badge badge-warning information1" ><span  class="information" id="lname"><?php echo $user->getLname();?></span></span></h4>
                          </div>
                      </div>    
  <!-- ******************************************************** user Name **********************************************-->           
                      <div class="form-group">
                          <div class="col-xs-6">
                          <label for="password" id="user_name"  class="label_info"><h4>User Name</h4></label> 
                          <h4><span class="badge badge-warning information1"><span  class="information" id="uname"><?php echo $user->getUname();?></span></span></h4>
                          </div>
                      </div>
<!-- ******************************************************** Phone number **********************************************-->           
                      <div class="form-group">
                        <div class="col-xs-6">
                            <label for="password" id="user_name"  class="label_info"><h4>Phone Number</h4></label>
                            <h4><span class="badge badge-primary information1"><span  class="information" id="phone"><?php echo $user->getPhone();?></span></h4>
                          </div>
                      </div>
                      <div class="form-group">
<!-- ******************************************************** Email **********************************************-->                   
                      <div class="col-xs-6">
                                <label for="password" id="user_name"  class="label_info"><h4>Email</h4></label>
                                <h4><span class="badge badge-warning information1"><span  class="information" id="email"><?php echo $user->getEmail();?></span></span></h4>
                          </div>
                      </div>
<!-- ****************************************************   Address **********************************************-->                
                      <div class="form-group">
                           <div class="col-xs-6">
                             <label for="password" id="addrees"  class="label_info"><h4>Address</h4></label>   
                             <h4><span class="badge badge-warning information1 " id="city"><span  class="information" id="address"><?php echo $user->getAddress();?></span></span></h4>
                          </div>
                      </div>
<?php if($ownprofile){ ?>
                      <div class="form-group col-md-12">
                        <br>
                        <div class="col-xs-12" id="editdiv">
                              <button type="button" class="col-md-3 btn btn-warning col-xs-3" id="editprofile" onclick="editProfile();">Edit</button>
                          </div>
                          
                      </div>
<?php }?>
                      <div class="form-group col-md-6 ">
                        <br>
                          
                          <div class="col-xs-12 ">
                          
                          </div>
                      </div>
                  </div><!--/tab-content-->
                             
                    <?php if($ownprofile){
     require_once './subtabsprofileseller.php';
                    }
?>
              
              
              
              
              
<!-- ******************************************************** edit **********************************************-->             
               
<!-- ******************************************************** End edit **********************************************-->             
          
        </div><!--/col-9-->
            
    </div><!--/row-->
            
</div>
                                               
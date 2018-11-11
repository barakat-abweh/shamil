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
           
                
                <!--  put the tabs profile seller requer -->
            
                    
                    
                    </ul>
          <div class="tab-content">
            <div class="tab-pane active " id="home"> 
<!-- ******************************************************** First Name **********************************************-->             
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="password" id="first_name" class="label_info"><h4>First Name</h4></label>
                            <h4><span class="badge badge-warning information1"><span class="information"><?php echo $user->getFname();?></span></span></h4>
                          </div>
                      </div>
<!-- ******************************************************** Last Name **********************************************-->              
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="password" id="user_name"  class="label_info"><h4> Last Name</h4></label>
                              <h4><span class="badge badge-warning information1" ><span  class="information"><?php echo $user->getLname();?></span></span></h4>
                          </div>
                      </div>    
  <!-- ******************************************************** user Name **********************************************-->           
                      <div class="form-group">
                          <div class="col-xs-6">
                          <label for="password" id="user_name"  class="label_info"><h4>User Name</h4></label> 
                              <h4><span class="badge badge-warning information1"><span  class="information"><?php echo $user->getUname();?></span></span></h4>
                          </div>
                      </div>
<!-- ******************************************************** Phone number **********************************************-->           
                      <div class="form-group">
                        <div class="col-xs-6">
                            <label for="password" id="user_name"  class="label_info"><h4>Phone Number</h4></label>
                            <h4><span class="badge badge-primary information1"><span  class="information"></span><?php echo $user->getPhone();?></span></h4>
                          </div>
                      </div>
                      <div class="form-group">
<!-- ******************************************************** Email **********************************************-->                   
                      <div class="col-xs-6">
                                <label for="password" id="user_name"  class="label_info"><h4>Email</h4></label>
                               <h4><span class="badge badge-warning information1"><span  class="information"><?php echo $user->getEmail();?></span></span></h4>
                          </div>
                      </div>
<!-- ****************************************************   Address **********************************************-->                
                      <div class="form-group">
                           <div class="col-xs-6">
                             <label for="password" id="addrees"  class="label_info"><h4>Address</h4></label>   
                            <h4><span class="badge badge-warning information1 " id="city"><span  class="information"><?php echo $user->getAddress();?></span></span></h4>
                          </div>
                      </div>
<?php if($ownprofile){ ?>
                      <div class="form-group col-md-12">
                        <br>
                          <div class="col-xs-12  ">
                             <button type="button" class="cc col-md-2 btn btn-warning col-xs-3" onclick="">Edit</button>
                             <button type="button" class="btn btn-success col-md-2 col-md-offset-2 col-xs-3" onclick="" disabled="">Save</button>
                             <!--<button type="button" style="float:right; margin-right:-15px " class=" btn btn-success col-xs-6 col-md-3 " onclick="">Change Password </button>-->
                        <!--    
                              <button id="change" class="btn btn-danger col-xs-offset-1 col-xs-3" 
                                data-toggle="modal"   data-target=".bs-example-modal-sm1">Change password </button>
                                <div class="modal bs-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header"><h4>Change Password <i class="fa fa-lock"></i></h4></div>
                                      <div class="modal-body"> Are you sure you want to Change?<br><br>
                                        
                                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Current passowrd"/><br>
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="New passowrd"/><br>
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Repassowrd"/>
                                        </div>
                                            
                                      <div class="modal-footer"><button class="btn btn-primary btn-block">Change Now</button></div>
                                      </div>
                                    </div>
                                </div>-->

                              
                          </div>
                          
                      </div>
<?php }?>
                      <div class="form-group col-md-6 ">
                        <br>
                          
                          <div class="col-xs-12 ">
                          
                          </div>
                      </div>
                  </div><!--/tab-content-->
                             
                    <!-- put sub tabs profile sellet requer -->
              
              
              
              
              
<!-- ******************************************************** edit **********************************************-->             
               
<!-- ******************************************************** End edit **********************************************-->             
          
        </div><!--/col-9-->
            
    </div><!--/row-->
            
</div>
  
           
           
    <br><br><br><br><br><br>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">    
                <div class="property-thumb">
                    <img src="../images/bg-img/feature1.jpg"  alt="">
                        
                    <div class="list-price">
                        <p>$945 679</p>
                    </div>
                </div>
                    <div class="property-content">
                        <h5>Villa in Los Angeles</h5>
                        <p class="location">
                        <img src="../images/icons/location.png" class="" alt="">Upper Road 3411, no.34 CA</p>
                        <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">    
                            <button type="button" class="btn btn-primary search_btn">More ...</button>                              
                        </div>
                    </div>
            </div>
        </div>
    </div>
                                               
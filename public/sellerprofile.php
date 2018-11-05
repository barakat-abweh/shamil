    <div class="container bootstrap snippet">
        <div class="row">
  		    <!--<div class="col-sm-3">
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar  img-thumbnail" alt="avatar">
                        <input type="file" class="text-center center-block file-upload ">
                </div>
                <br>
            </div>!-->
            <?php
            require_once('profilepicture.php');
            ?>
                <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><h4>Information</h4></a></li>
            </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="home">                      
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
                      <div class="form-group col-md-6">
                        <br>
                          <div class="col-xs-12  ">
                             <button type="button" class="cc btn btn-warning col-xs-6 col-md-4 ">Edit</button>
                             <button type="button" class="dd btn btn-success col-xs-6 col-md-4 ">Save</button>
                          </div>
                      </div>
                      <div class="form-group col-md-6 ">
                        <br>
                          <div class="col-xs-12 ">
                          </div>
                      </div>
                  </div><!--/tab-content-->
                                              
         
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
                        <div class="tag">
                            <span>For Sale</span>
                        </div>
                    <div class="list-price">
                        <p>$945 679</p>
                    </div>
                </div>
                    <div class="property-content">
                        <h5>Villa in Los Angeles</h5>
                        <p class="location">
                        <img src="../images/icons/location.png" class="pic_in_model_pro" alt="">Upper Road 3411, no.34 CA</p>
                        <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                        <div class="property-meta-data d-flex align-items-end justify-content-between">    
                            <button type="button" class="btn btn-primary search_btn">More ...</button>                              
                        </div>
                    </div>
            </div>
        </div>
    </div>
                                               
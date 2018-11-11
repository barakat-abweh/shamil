<!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
        <div class="container">
            <div class="row ">
                <div class="col-12 ">
                    <div class="advanced-search-form">                     
                        <!-- Search Form -->
                        <form action="#" method="post" id="add-property" enctype="multipart/form-data" >
                            <div class="row ">
        <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 ">  
<!-- ***************************************************************************************************** 1 image -->
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span>Select picture 1</span>
                                <span class="btn btn-primary btn-file"><span class="fileupload-new"></span>
                                    <input type="file" class="file-upload" name="img1" id="img1"/></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                            </div><br>
                    
<!-- ***************************************************************************************************** 2 image -->
                    <div class="input-group">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span>Select picture 2</span>
                                <span class="btn btn-primary btn-file"><span class="fileupload-new"></span>
                                    <input type="file" class="file-upload" name="img2" id="img2"/></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                            </div><br>
                    </div><br>
                                
                                    
<!-- ***************************************************************************************************** 3 image -->
                    <div class="input-group">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span>Select picture 3</span>
                                <span class="btn btn-primary btn-file"><span class="fileupload-new"></span>
                                    <input type="file" class="file-upload" name="img3" id="img3"/></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                            </div><br>
                    </div><br>
                                        
                                    
                                    
<!-- ***************************************************************************************************** 4 image -->
                <div class="input-group">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span>Select picture 4</span>
                                <span class="btn btn-primary btn-file"><span class="fileupload-new"></span>
                                    <input type="file" class="file-upload" name="img4" id="img4"/></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                            </div><br>
                    </div>             
                                </div>     

 <!-- ************************************************************************************************** List and Text area(dis) -->
             
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="form-group">
                                    <input placeholder="Name" type="text" class="form-control" name="property_name" id="property_name"/>
                                </div>
                            
                                    <div class="form-group">
                                        <select class="form-control" name="city" id="cities">
                                           <?php echo $user->getUserCities();?> 
                                        </select>        
                            </div>
                              
                                
                                   <div class="form-group">
                                       <select class="form-control" name="type" id="catagories">
                                           <?php echo $property->getTypes();?>
                                        </select>
                                    </div>
                                 
                                    
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                  </div>
                                    <input placeholder="Price " type="text" id="price" name="price" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                </div>
                                
<!-- ************************************************************************************************ List cat and pice and button -->

                        <div class="col-12 col-md-4 col-lg-3">                
                            <div class="form-group">
                                    <input placeholder="Area" type="text" class="form-control" name="area" id="area"/>
                                </div>
                            <div class="form-group">
                            <textarea class="col-md-12" style="resize: none;height:105px;" id="Descripton" name="description" placeholder="Descripton" >          
                                </textarea>
                            </div>
                             <div class="form-group">
                            <button type="button" class="btn btn-primary col-md-12"  id="add_new_property" style="margin-top:9px;">Add New Property</button>
                            </div>
                        </div>
                        </div>      

                           
        
                        </form>
<!-- ***************************************************************************************************** end form -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Advance Search Area End ##### -->

    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="-content-wrapper section-padding-100">
        <div class="container ">
            <div class="row ">
                <div class="col-12">
                    <div class="listings-top-meta d-flex justify-content-between mb-100">
                        
                        <div class="order-by-area d-flex align-items-center">
                            <span class="mr-15">Order by:</span>
                            <select>
                              <option selected>Default</option>
                              <option value="1">Newest</option>
                              <option value="2">Old</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row">

                <!--************************************** first ***************************************** -->
                <?php
                $res=$user->getOwnedProperties();
                while($result=$database->fetchArray($res))
                        {
                ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="<?php echo "../users/".$result['owner_id']."/images/properties/".$result['property_id']."/1.png"; ?>" alt="" class="pic_in_model_pro">
                            <div class="list-price">
                                <h3><p><?php
                               echo $result['price'];
                                ?></p></h3>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5><?php
                                echo $result['property_name'];
                                ?></h5>
                            <p class="location"><img src="../images/icons/location.png"  alt=""><?php echo $property->getCityName($result['city_id']); ?></p>
                            <p><?php echo $result['description'];?></p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">    
                                <a class="btn btn-primary search_btn" href="property.php?property_id=<?php echo $result['property_id'];?>">More ...</a>
                            </div>
                        </div>
                    </div>
                </div>

<?php
                }
?>
        </div>
        </div>
    </section>
    <!-- ##### Featured Properties Area End ##### -->
       <!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
        <div class="container">
            <div class="row ">
                <div class="col-12 ">
                    <div class="advanced-search-form">                     
                        <!-- Search Form -->
                        <form action="#" method="post" id="advanceSearch" >
                            <div class="row ">
        <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 ">  
<!-- ***************************************************************************************************** 1 image -->
                    <div class="input-group ">
                            <input type="text" class="form-control file-upload-text " disabled placeholder="select a picture 1" />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success file-upload-btn ">
                                    Browse...
                                    <input type="file" class="file-upload uploud_pic" name="myFile" />
                                </button>
                            </span>
                    </div><br>
<!-- ***************************************************************************************************** 2 image -->
                    <div class="input-group">
                            <input type="text" class="form-control file-upload-text" disabled placeholder="select a picture 2" />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success file-upload-btn">
                                    Browse...
                                    <input type="file" class="file-upload" name="myFile" />
                                </button>
                            </span>
                    </div><br>
                                
                                    
<!-- ***************************************************************************************************** 3 image -->
                    <div class="input-group">
                            <input type="text" class="form-control file-upload-text" disabled placeholder="select a picture 3" />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success file-upload-btn">
                                    Browse...
                                    <input type="file" class="file-upload" name="myFile" />
                                </button>
                            </span>
                    </div><br>
                                        
                                    
                                    
<!-- ***************************************************************************************************** 4 image -->
                <div class="input-group">
                            <input type="text" class="form-control file-upload-text" disabled placeholder="select a picture 4" />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success file-upload-btn">
                                    Browse...
                                    <input type="file" class="file-upload" name="myFile" />
                                </button>
                            </span>
                    </div>             
                                </div>     

 <!-- ************************************************************************************************** List and Text area(dis) -->
             
                        <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="cities">
                                           <?php echo $user->getUserCities();?> 
                                        </select>        
                            </div>
                              
                                
                                   <div class="form-group">
                                        <select class="form-control" id="catagories">
                                           <?php echo $property->getTypes();?>
                                        </select>
                                    </div>
                                 
                                    
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                  </div>
                                    <input placeholder="Price " type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            <button type="button" class="btn btn-primary col-md-12">Insert New </button>
                                </div>
                                
<!-- ************************************************************************************************ List cat and pice and button -->

                        <div class="col-12 col-md-4 col-lg-3">                
                                <textarea class="md-" id="Discripton" placeholder="Discripton"></textarea>
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
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="600ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="../images/bg-img/feature6.jpg" alt="">

                            
                            <div class="list-price">
                                <p>$945 679</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>Villa in Los Angeles</h5>
                            <p class="location"><img src="../images/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                            <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">    
                             <button type="button" class="btn btn-primary search_btn">More ...</button>

                              
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </section>
    <!-- ##### Featured Properties Area End ##### -->
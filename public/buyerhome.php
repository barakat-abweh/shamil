    <!-- ##### Featured Properties Area Start ##### -->
<div class="container">
<form  class="filter-form" id="buyer_searches_w_l">
    	    <div id="custom-search-input">
                <div class="input-group searches">
                    <input type="text" class="search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-light search_btn">Search</button>
                    </span>
                </div>
                </div>
			</form> 
</div>
<section class="featured-properties-area section-padding-100-50 section_in_profile_payer">
        <div class="container">              
            <br><br>
            <div class="row">
                <!--************************************** First ***************************************** -->
                <?php
                $res=$property->getRandomProperties();
                while($result=$database->fetchArray($res))
                        {
                ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img src="../images/bg-img/feature1.jpg" alt="">
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
                            <p class="location"><img src="../images/icons/location.png" alt=""><?php echo $property->getCityName($result['city_id']); ?></p>
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
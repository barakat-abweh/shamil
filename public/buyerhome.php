    <!-- ##### Featured Properties Area Start ##### -->
<div class="container">
    <form  class="filter-form" id="buyer_searches_w_l" method="POST" action="search.php">
    	    <div id="custom-search-input">
                <div class="input-group searches">
                    <input type="text" class="search-query form-control" placeholder="Search" name="in"/>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-light search_btn">Search</button>
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
                            <img class="imges_random" src="<?php echo "../users/".$result['owner_id']."/images/properties/".$result['property_id']."/1.png"; ?>" alt="">
                            <div class="list-price">
                                <h3><p><?php
                               echo $result['price'];
                                ?></p></h3>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5 style="color: black;"><?php
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
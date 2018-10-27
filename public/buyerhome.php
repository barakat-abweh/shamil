
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

 
	<div class="filter-search">
		<div class="container">
                            <!--************************************** start form ***************************************** -->

                            <form class="filter-form" id="buyer_search">
				<div class="container">
    	    <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" class="search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-light search_btn">Search</button>
                    </span>
                </div>
            </div>
                </div>
			</form>
                            <!--************************************** end form ***************************************** -->

		</div>
	</div>
    
    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>

            <div class="row">

                <!--************************************** First ***************************************** -->
                <?php
                require_once '../includes/property.php';
                $property->setDataBase($database);
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
                                <p><?php
                               echo $result['price'];
                                ?></p>
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
        </div>
    </section>
    <!-- ##### Featured Properties Area End ##### -->
<html>

    <head>
        <link rel="stylesheet" href="../styles/serachResult.css" type="text/css">
        <link rel="stylesheet" href="../styles/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="icon" href="images/core-img/favicon.ico">
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/homepage.css">
    <link rel="stylesheet" href="../styles/homenavbar.css"/>
    <link rel="stylesheet" href="../styles/Logo.css"/>
    <link rel="stylesheet" href="../styles/style_login.css">
    <link rel="stylesheet" type="text/css" href="../styles/sweetalert.css"/>
    <link rel="stylesheet" href="../styles/profilesallerpage.css">
    <link rel="stylesheet" href="../styles/animate.css">
    <link rel="stylesheet" href="../styles/themify-icons.css">
    <link rel="stylesheet" href="../styles/classy-nav.min.css">
    <link rel="stylesheet" href="../styles/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/owl.carousel.css">
    <link rel="stylesheet" href="../styles/magnific-popup.css">
    <link rel="stylesheet" href="../styles/sweetalert.css">
        
    
    </head>
    <body>
<?php
        require_once '../includes/users.php';
        require_once '../includes/database.php';
        require_once '../includes/property.php';
        $property->setDataBase($database);
        global $database;
        $user->setDataBase($database);
        require_once '../includes/session.php';
        if ($session->isLoggedIn()) {
            ?>
    <div class="cover">
    <?php
            require_once './homenavbar.php';
            ?>
    </div>
        <?php
        } else
        {
        require_once './loginnavbar.php';
        require_once './cover.php';
        }
$in;
$result;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../includes/search.php');
    require_once('../includes/functions.php');
    $search->setDatabase($database);
    $property->setDataBase($database);
    if (isset($search)) {
          if (isset($_POST['in'])&&!isEmpty($_POST['in'])) {
            $in = $_POST['in'];
            $in = htmlspecialchars($in);
            $in = $search->set_in($in);
            $result = $search->property_search();
        } else {
            header("LOCATION:index.php");
        }
    } else {
        header("LOCATION:index.php");
    }
} else {
    header("LOCATION:index.php");
}
?>


        <div class="container">

            <section class="col-xs-12 col-sm-6 col-md-12">
        <?php 
        $user->setId($session->getUserId());
            $cities=$user->getCountryCities();
            while($result1=$database->fetchArray($result)){
                if(!in_array($result1['city_id'], $cities)){
                    continue;
                    }
              ?>
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="<?php echo "../users/".$result1['owner_id']."/images/properties/".$result1['property_id']."/1.png"; ?>" class="imagereslut" alt="<?php echo $result1['property_name']; ?>" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
                                    <li><i class="glyphicon glyphicon-calendar"></i> <span><?php $c_date= explode(" ", $result1['creation_date']); 
                                    echo $c_date[0];
                                    ?></span></li>
					<li><i class="glyphicon glyphicon-time"></i> <span><?php echo $c_date[1];?></span></li>
                                        <li><i class="glyphicon glyphicon-tags"></i> <span><?php $property->setId($result1['property_id']); 
                                        echo $property->getType();
                                        ?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<h3><a href="<?php echo "property.php?property_id=".$result1['property_id']; ?>" title=""><?php echo $result1['property_name']; ?></a></h3>
				<p><?php echo $result1['description']; ?></p>									</div>
			<span class="clearfix borda"></span>
		</article>		
        <?php
        
        }?>
	</section>
</div>
   
        <script src="../scripts/jquery-3.2.1.min.js"></script>
        <script src="../scripts/bootstrap.min.js"></script>
         <script src="../scripts/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../scripts/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../scripts/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../scripts/plugins.js"></script>
    <script src="../scripts/classy-nav.min.js"></script>
    <script src="../scripts/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="../scripts/active.js"></script>
    <script src="../scripts/sweetalert.min.js"></script>
    <script src="../scripts/profilesallerpage.js"></script>
    <script src="../scripts/signin.js"></script>
    <script src="../scripts/sweetalert.min.js"></script>
    <script src="../scripts/addproperty.js"></script>
    </body>
</html>
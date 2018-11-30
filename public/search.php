<?php
$in;
$result;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../includes/database.php';
    require_once('../includes/search.php');
    require_once('../includes/functions.php');
    require_once '../includes/property.php';
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

<html>

    <head>
        <link rel="stylesheet" href="../styles/serachResult.css" type="text/css">
        <link rel="stylesheet" href="../styles/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
    
    </head>
    <body>
    
        <div class="container">

    <hgroup class="mb20">
		<h1>Search Results</h1>
		<h2 class="lead"><strong class="text-danger"><?php echo $search->getDataBase()->numRows($result); ?></strong> results were found for the search for <strong class="text-danger"><?php echo $in;?></strong></h2>								
	</hgroup>

    <section class="col-xs-12 col-sm-6 col-md-12">
        <?php while($result=$database->fetchArray($result)){
            ?>
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="<?php echo "../users/".$result['owner_id']."/images/properties/".$result['property_id']."/1.png"; ?>" class="imagereslut" alt="<?php echo $result['property_name']; ?>" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
                                    <li><i class="glyphicon glyphicon-calendar"></i> <span><?php $c_date= explode(" ", $result['creation_date']); 
                                    echo $c_date[0];
                                    ?></span></li>
					<li><i class="glyphicon glyphicon-time"></i> <span><?php echo $c_date[1];?></span></li>
                                        <li><i class="glyphicon glyphicon-tags"></i> <span><?php $property->setId($result['property_id']); 
                                        echo $property->getType();
                                        ?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<h3><a href="<?php echo "property.php?property_id=".$result['property_id']; ?>" title=""><?php echo $result['property_name']; ?></a></h3>
				<p><?php echo $result['description']; ?></p>									</div>
			<span class="clearfix borda"></span>
		</article>		
        <?php
        
        }?>
	</section>
</div>
   
        <script src="../scripts/jquery-3.2.1.min.js"></script>
        <script src="../scripts/bootstrap.min.js"></script>
    </body>
</html>
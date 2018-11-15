<?php
if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="GET"){
    if(isset($_GET['property_id'])){
        $property_id=htmlspecialchars($_GET['property_id']);
        if(is_numeric($property_id)&&strlen($property_id)>=1&&strlen($property_id)<=11){
            require_once '../includes/database.php';
            require_once '../includes/property.php';
            $property->setDataBase($database);
            $property->setId($property_id);
            if($property->isDeleted()){redirect();}
            if(gettype($property->getId())=="NULL"){
                redirect();
            }
        }
        else{
        redirect();
    }
    }
    else{
        redirect();
    }
}
else{
        redirect();
    }
    
function redirect(){
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Property</title>
    <link href="../styles/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../styles/homenavbar.css"/>
    <link rel="stylesheet" href="../styles/Logo.css"/>
    <link rel="stylesheet" href="../styles/style_login.css">
    <link rel="stylesheet" type="text/css" href="../styles/sweetalert.css"/>
    <link href="../styles/viewrealstate.css" rel="stylesheet">
  </head>

  <body>
      
      <?php
      require_once '../includes/session.php';
        if ($session->isLoggedIn()) {?>
      <div class="cover">
      <?php
            require_once './homenavbar.php';
            ?>
          
      </div>
            <?php
        }
        else{
            require_once './loginnavbar.php';
        }
      ?>
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="col-md-6">
						
						<div class="tab-content">
						  <div class="tab-pane active" ><img src="<?php echo "../users/".$property->getOwnerId()."/images/properties/".$property_id."/1.png"; ?>" id="pic-1"/></div>
                        </div>
						
                      <ul class="preview-thumbnail nav nav-tabs">
			 <li class="active">
                            <a data-target="#pic-1" data-toggle="tab"  onclick="changepic(<?php echo "'../users/".$property->getOwnerId()."/images/properties/".$property_id."/1.png'";?>)"><img class="css3_pic" src="<?php echo "../users/".$property->getOwnerId()."/images/properties/".$property_id."/1.png"; ?>" /></a>
                          </li>
                          
                         <li class="active">
                            <a data-target="#pic-1" data-toggle="tab"  onclick="changepic(<?php echo "'../users/".$property->getOwnerId()."/images/properties/".$property_id."/2.png'";?>)"><img class="css3_pic" src="<?php echo "../users/".$property->getOwnerId()."/images/properties/".$property_id."/2.png";?>" /></a>
                          </li>
						 
                         <li class="active">
                            <a data-target="#pic-2" data-toggle="tab"   onclick="changepic(<?php echo "'../users/".$property->getOwnerId()."/images/properties/".$property_id."/3.png'";?>)"><img class="css3_pic" src="<?php echo "../users/".$property->getOwnerId()."/images/properties/".$property_id."/3.png";?>" /></a>
                         </li>  
						  
                         <li class="active  ">
                            <a data-target="#pic-3" data-toggle="tab"  onclick="changepic(<?php echo "'../users/".$property->getOwnerId()."/images/properties/".$property_id."/4.png'";?>)"><img class="css3_pic " src="<?php echo "../users/".$property->getOwnerId()."/images/properties/".$property_id."/4.png";?>" /></a>
                         </li>			
                        </ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title d-inline p-2 bg-success text-white"><?php echo $property->getName();?></h3>
					
						<p class="product-description"><?php echo $property->getDescription();?></p>
						<h4 class="price  d-inline p-2 bg-light ">Owner: <span><?php echo $property->getOwner();?></span></h4>
						<h4 class="price  d-inline p-2 bg-light ">Address: <span><?php echo $property->getAddress();?></span></h4>
                                                <h4 class="price  d-inline p-2 bg-light ">Type: <span><?php echo $property->getType();?></span></h4>
                                                <h4 class="price  d-inline p-2 bg-light ">Area: <span><?php echo $property->getArea();?></span></h4>
						<h4 class="price  d-inline p-2 bg-light ">Price: <span><?php echo $property->getPrice();?></span></h4>
						<?php require_once '../includes/session.php';
                                                 if ($session->isLoggedIn()) {
                                                     require_once '../includes/users.php';
                                                     $user->setDataBase($database);
                                                     $user->setId($session->getUserId());
                                                     if($user->getType()==0){
                                                         if($session->getUserId()==$property->getOwnerId()){?>
                                                <div class="action col-xs-12">
                                                    <button class="col-md-3  btn btn-warning" id="editproperty" type="button" onclick="editProperty('<?php echo $property_id?>');">Edit</button>
                                                    <button class="col-md-3 btn btn-danger" id="deleteproperty" type="button" onclick="deleteProperty('<?php echo $property_id?>');">Delete</button>
						</div>
                                                 <?php }
                                                 else{?>
                                                <script>window.location ="index.php"</script>
                                                <?php
                                                 }
                                                         }
                                                     else if($user->getType()==1){
                                                         ?>
                                                
						<div class="action">
                                                    <button class="add-to-cart btn btn-success" id="interested" type="button" onclick="interested('<?php echo $property_id?>');">Interested!</button>
						</div>
                                                <?php
                                                     }
                                                }
                                                else{
                                                    ?>
                        <h4 class="d-inline p-2 bg-danger">You should login in order to purchase</h4>
                                                <?php
                                                }
                                                ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<!------ Include the above in your HEAD tag ---------->
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
    <script src="../scripts/sweetalert.min.js"></script>
    <script src="../scripts/signin.js"></script>
    <script src="../scripts/property.js"></script>
    </body>
</html>

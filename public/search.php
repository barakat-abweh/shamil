<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../includes/database.php';
    require_once('../includes/search.php');
    require_once('../includes/functions.php');
    $search->setDatabase($database);
    if (isset($search)) {
          if (isset($_POST['in'])&&!isEmpty($_POST['in'])) {
            $in = $_POST['in'];
            $in = htmlspecialchars($in);
            $in = $search->set_in($in);
            $result = $search->search();
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

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Web2 porject:XHTML1.0 Strict with HTML-Kit" />
        <meta name="keywords" content="project,Easy,Trade,Easy Trade"/>
        <meta name="author" content="Barakat Abwe,Rabei Daraghmeh,Firas Qzaih,Anas Salahat,Mohammed Hmeidat" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Search</title>
        <!-- Bootstrap -->
        <link href="../styles/bootstrap.css" rel="stylesheet" /><link href="../styles/navbar.css" rel="stylesheet" />
        <link href="../styles/search.css" type="text/css" rel="stylesheet">
      
    </head>
    <body>
        <?php require_once './navbar.php'; ?>
        <div class="row "><div class="col-md-6 col-md-offset-1"> <h1><i><?php print ($search->getDatabase()->numRows($result)); ?> users are found</i></h1></div></div
        <div class='result'>
            <?php while ($result_set = $search->getDatabase()->fetchArray($result)) { ?> 
                <div class="row" >
                    <div class="col-md-4 bor col-md-offset-1">

                        <div class="row" >
                            <div class="col-md-4"> 
                                <img class= "profile pic" src= '<?php echo $search->getImgProfile($result_set['userid']); ?>'/>
                            </div>

                            <div class="col-md-7 "style="margin-top: -10px;"><h3> 
                                    <a href="../public/Profile.php?id=<?php echo $result_set['userid']; ?>" class="btn btn-success"> <?php print($result_set['fname'] . " " . $result_set['lname']); ?></a>
                                </h3>
                                <br/>
                                <span class="btn btn-primary">  Address : <?php print($result_set['Address']); ?></span>
                                <br/>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
        <script src="../scripts/jquery.js"></script>
        <script src="../scripts/bootstrap.js"></script>
        <script src="../scripts/navbar.js"></script>
    </body>
</html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Chat Panel</title>
    <link rel="stylesheet" href="../../styles/bootstrap.css">
    <link rel="stylesheet" href="../../styles/font-awesome.css">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../../styles/responsive.css">
    <link rel="icon" type="img/ico" href='img/favicon-icon.png'>
    <script src="../../scripts/jquery-3.2.1.min.js"></script>
    <script src="../../scripts/bootstrap.js"></script>
    <script src="../js/index.js"></script>
    <script src="https://use.fontawesome.com/10a964325b.js"></script>
</head>


<body>
    <!--////////////////TOP NAVBAR FIXED NAVBAR////////////////-->
    <div class="main-container">
        <nav class="navbar navbar-fixed-top admin-navbar">
            <div class="container-fluid">
                <div class="navbar-header" style="display: inline-block;">
                    <button id="menu_icon"><i class="fa fa-bars" aria-hidden="true"></i></button>
                    <a href="index.html" class="admin-chat-logo"></a>
                </div>

          
            </div>
        </nav>

       <aside class="hit_sidebar open_sidbar sidebar-slide-push">
            <ul>
            <li><a href="#" class="activ" onclick="getUP(1)">
            <span class="nav-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>            
            <span class="remove_text">Users</span></a></li>
            <li><a href="#" class="activ" onclick="getUP(4)">
            <span class="nav-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>            
            <span class="remove_text">Deactivated Users Accounts</span></a></li>
            <li><a href="#" class="activ" onclick="getUP(5)">
            <span class="nav-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>            
            <span class="remove_text">Deleted Users Accounts</span></a></li>
            <li><a href="#" class="activ" onclick="getUP(2)">
            <span class="nav-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>            
            <span class="remove_text">Properties</span></a></li>
            <li><a href="#" class="activ" onclick="getUP(3)">
            <span class="nav-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>            
            <span class="remove_text">Deleted Properties</span></a></li>
            <li><a href="../includes/logout.php" class="activ">
            <span class="nav-icon"><i class="fa fa-power-off" aria-hidden="true"></i></span>
            <span class="remove_text">Logout</span> </a></li>
            </ul>
        </aside>
        <section id="content_body">
        <div class="container">
            <p>Welcome Mr. Admin</p>
        <div class="row col-md-11  custyle">
            <table class="table table-striped custab" id="table">
    </table>
            </div>
        </div>
       </section>
    </div>
    <script src="../js/admin.js" type="text/javascript"></script>
</body>
</html>
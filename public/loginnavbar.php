<!-- ##### Header Area Start ##### -->
     <header class="header-area">
        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="../images/office_R_blue.png" id="logo" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <a href="aboutus.php"><h6><span style="color:White">About us</span></h6></a>
                        
                    <!-- Menu -->
<!-- ********************************************** FORM LOGIN ******************************************************** -->                   
                    <div class="classy-menu">
                        <form id="signinform" class="" action="../includes/signinVal.php" method="post" >
                        <div class="classynav">
                            <ul>                               
                              
                                <li> <div class="form-group">
                                        <input type="text" name="email" class="form-control color_text" id="email" aria-describedby="emailHelp" placeholder=" User Name">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                    <input type="password" name="password" class="form-control color_text" id="password" placeholder="Password" >
                                    </div>
                                </li>
                                <li>
                                    <button type="submit" id="signin" class=" btn btn-primary"> Login</button>
                                    <button type="button" id="signup" class=" btn btn-primary"> Signup</button>
                                <span  class="btn btn-warning" id="logout" style="color:white;cursor: pointer"  data-toggle="modal" data-target=".bs-example-modal-sm">Forget Password </span>
                                <div class="modal bs-example-modal-sm"  tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header" style="margin:auto;"><h4 style="color:black;">Change Password</h4></div>
                                      <div class="modal-body" id="forget_pass"> 
                                        
                                          <div class="form-group">
                                      <div ><h6 style="color:black;">Insert your email:</h6></div>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                            <small id="emailHelp" class="form-text text-muted">You will receive a message to your email, please check it.</small>
                                          </div>
                                        </div>
                                      <div class="modal-footer"><a href="#" id="resetpass" class="btn btn-primary btn-block">Send to email</a></div>
                                    </div>
                                  </div>
                                </div>
                                    
                                    
                                </li>                               
                            </ul>
                        </div>
                        </form>
                    </div>
<!-- **********************************************END FORM LOGIN ******************************************************** -->         
                </nav>
            </div>
        </div>
    </header>


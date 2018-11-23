            <div class="tab-pane " id="notification">
        <div class="col-xs-4 notification_tab">
                <span id=""><h4>Notifications</h4></span>
                <div class="notification">
                    <?php
                    if($user->getType()=="0"){
                        require_once 'sellernotifications.php';                        
                    }
                    else{
                        require_once 'buyernotifications.php';
                    }
                    ?>
                </div>    
                </div>
              </div>                                  
            <div class="tab-pane " id="messages">
                <div class="col-xs-8 messages">
                <span id=""><h4>Messages</h4></span>
                    <?php require_once './messages.php';?>
     </div>
            
            
              </div>                                  
            <div class="tab-pane " id="changepass">
                <form method="POST" action="../includes/changepass.php">
                  <div class="form-group">
                    <label for="currpass">Current Password</label>
                    <input type="password" class="form-control" id="currentpass" aria-describedby="emailHelp" name='currentpass' placeholder="Current Pasword">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="newpass">Password</label>
                    <input type="password" class="form-control" id="newpass" name='newpass' placeholder="Password">
                  </div>
                  <div class="form-check">
                    <label for="Repass">Repassword</label>
                    <input type="password" class="form-control" id="passconf" name='passconf' placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Change password</button>
            </form>
              
              
              
              </div>     
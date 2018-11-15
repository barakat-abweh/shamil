<div class="" id="profile">
                <div id="imgContainer text-center">
                    <form enctype="multipart/form-data" action="image_upload_demo_submit.php" method="post" name="image_upload_form" id="image_upload_form">
                        <div id="imgArea"><img class="avatar img-thumbnail" src="<?php echo $user->getProfilePicture();?>">
                            <div class="progressBar">
                                <div class="bar"></div>
                                <div class="percent">0%</div>
                            </div>
                            <div id="imgChange"><span>Upload Photo</span>
                                <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
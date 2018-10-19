<?php
echo "Good ID ".$good->getId();
mkdir("..\users\user$userid\images\Products\\".$good->getId());
$target_dir="..\users\user$userid\images\Products\\".$good->getId();



for($i=1;$i<=4;$i++){
 $target_file=basename($_FILES["fileToUpload".$i]["name"]); 
  $size= getsize($_FILES["fileToUpload".$i]["tmp_name"]);
    $imgsize=$_FILES["fileToUpload".$i]["size"];
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    if($size && fileexist($target_file) && checkuploadsize($imgsize) && checktype($imageFileType) ){$flag7=true;}
    else  redirect();
}
       
     // echo "$target_dir\\"."$i.$imageFileType";
   if (move_uploaded_file($_FILES["fileToUpload"."$i"]["tmp_name"], "$target_dir\\$i.$imageFileType")) {
       
       // echo "The file ". $target_file. " has been uploaded.";
              
    } else {
    //    echo "Sorry, there was an error uploading your file.";
        redirect();
    }  
     






function getsize($getsize){
    $check = getimagesize($getsize);
    if($check !== false) {
       // echo "File is an image - " ;
        return true;
    } else {
     //   echo "File is not an image.";
        return false;
    }  }

function fileexist($target_file){
  if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
    return false;
}
else return true;
}

function checkuploadsize($imgsize){
  if ($imgsize > 81920) {
   // echo "Sorry, your file is too large.";
    return false;
} 
    else {return true;}
}

function checkTypeImg($imageFileType){
    $imageFileType=strtoupper($imageFileType); 
    // Allow certain file formats
if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&&$imageFileType != "GIF" ) {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    return false;
} 
return true;
}
















?>
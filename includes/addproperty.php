<?php  
$name;
$type;
$price;
$city;
$description;
$area;
$flag1= FALSE;
$flag2 = FALSE;
$flag3 = FALSE;
$flag4 = FALSE;
$flag5 = FALSE;
$flag6= FALSE;
$flag7 = FALSE;
require_once 'session.php';
$userid;
if($session->isLoggedIn()){$userid=$session->getUserId();

}
        else    redirect ();
if ($_SERVER["REQUEST_METHOD"] == "POST") { #check type request 
 $field=htmlspecialchars($_POST['property_name']);
    if(!isEmtpy($field)){
        $field=trim($field);
     if(checkName($field)){$name=$field;$flag1=true;}
     else redirect();
    }
    
    $field=htmlspecialchars($_POST['type']);
     if(!isEmtpy($field)){
         $field=trim($field);
     if(checkType($field)){$type=$field;$flag2=true; } 
     else redirect();
    }
    $field=htmlspecialchars($_POST['price']);
     if(!isEmtpy($field)){
     if(checkPrice($field)){$price=$field;$flag3=true;} 
     else redirect();
    }
    $field=htmlspecialchars($_POST['city']);
     if(!isEmtpy($field)){
     if(checkChar($field)){
         $city=$field;$flag4=true;} 
     else redirect();
    }
     $field=htmlspecialchars($_POST['description']);
     if(!isEmtpy($field)){
    if(checkMoreinfo($field)){ $description=$field;$flag5=true;}
    else{
    redirect();
    }
    }
    for($i=1;$i<=4;$i++){   
        $flag7=false;
    $target_file=basename($_FILES["img".$i]["name"]); 
    $size= getsize($_FILES["img".$i]["tmp_name"]);
    $imgsize=$_FILES["img".$i]["size"];
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    if($size && fileexist($target_file) && checkuploadsize($imgsize) && checktype($imageFileType) ){$flag6=true;}
    else  redirect();
}   
$field=htmlspecialchars($_POST['area']);
     if(!isEmtpy($field)){
    if(checkNum($field)){ 
        $area=$field;$flag7=true;
    }
    }
    if ($flag1 && $flag2 && $flag3 && $flag4 && $flag5 && $flag6 && $flag7) {
       require_once ('./property.php');
       require_once './database.php';
       $property->setDataBase($database);
       if (isset($property)) {
          $property->setName($name);
          $property->setType($type);
          $property->setPrice($price);
          $property->setCity($city);
          $property->setDescription($description);
          $property->setOwnerId($userid);
          $propertyid=$property->getLatestId()+1;
         $property->setId($propertyid);
         $property->setArea($area);
         $property->storeproperty();
         $target_dir="../users/$userid/images/properties/$propertyid";
         mkdir($target_dir);
         $PNG_WEB_DIR = $target_dir."/";
       #save images for good in targer_path
          for($i=1;$i<=4;$i++){
             // if(move_uploaded_file($_FILES["img"."$i"]["tmp_name"], "$target_dir\\$i.$imageFileType"));
              if(move_uploaded_file(imagepng(imagecreatefromstring(file_get_contents($_FILES["img"."$i"]["tmp_name"])), "$target_dir/$i.png"))){
            $target_file=basename($_FILES["img".$i]["name"]);
          //  $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
              }
           
          }
              
        }
        redirect();
    }
    
    
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
  if ($imgsize > 3145728) {
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


function checkName($name) {
    $min=3;$max=20;$length=strlen($name);
    if($length<$min  || $length>$max)return false;
   if(checkNum_Char($name))return true;
   return false;
}

function checkType($type) {
    $min=2;$max=25;$length=strlen($type);
    if($length<$min  || $length>$max)return false;
   if(checkNum_Char($type))return true;
   return false;
}
function checkPrice($price) {
      $min=1;$max=10;$length=strlen($price);
    if($length<$min  || $length>$max)return false;
if(checkNum($price))return true;
return false;
}
function checkOffer($offer) {
      $min=0;$max=100;$length=strlen($offer);
    if($offer<$min  || $offer>$max)return false;
if(checkNum($offer))return true;
return false;
}
function checkQuant($quantity) {
      $min=1;$max=10;$length=strlen($quantity);
    if($length<$min  || $length>$max)return false;
if(checkNum($quantity))return true;
return false;
}
function checkMoreinfo($checkMoreinfo){
       $min=0;$max=300;$length=strlen($checkMoreinfo);
    if($length<$min  || $length>$max)return false;
    return true;
}

# functions to Check the status of letters;

function redirect(){ #redirect page
    header("Location: ../public/home.php");
}

function checkChar($value) {
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #Return the ASCII value of character
        if($as==32)continue; #if value = space
       else if (($as >= 65 && $as <= 90) || ($as >=97 && $as <= 122))continue; 
       else return false;
    }
    return true;
}
function checkNum_Char($value){
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #Return the ASCII value of character
        if($as==32)continue;
        else if (($as >= 65 && $as <= 90) || ($as >=97 && $as <= 122) || ($as>=48 && $as<=57))continue; 
       else return false;
       
        }       
    return true;
}

function checkNum($value) {
   $arr = str_split($value);
   for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #ord() Return the ASCII value of character
        if($as<48 || $as>57)return false;
    }
    return true;  
}


function isEmtpy($value){
   if($value=="")return true;
   else{ 
     $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
     if($arr[$i]!=" "){return false;} #Considered  the spaces without any character empty field
   }}
   return true;
     
}



?>
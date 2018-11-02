$(document).ready(function () {
    //functions Upload image validate 
    function checkTypeImg(imageFileType) {
        imageFileType = imageFileType.toString().toUpperCase();
        // Allow certain file formats
        if (imageFileType !== "JPG" && imageFileType !== "PNG" && imageFileType !== "JPEG"
                && imageFileType !== "GIF") {
            sweetAlert("Upload failed", "extention: " + imageFileType + "\n  only JPG, JPEG, PNG & GIF files are allowed.", "error");
            return false;
        }
        return true;
    }

    function checkSizeImg(imageFileSize) {
        size = imageFileSize.size;
        if (size > 3145728)
            return false;
        return true;
    }

    function getExt(filename) {
        return /[^.]+$/.exec(filename);
    }

    $("#img1").change(function () {
        Change(this);
    });
    $("#img2").change(function () {
        Change(this);
    });
    $("#img3").change(function () {
        Change(this);
    });
    $("#img4").change(function () {
        Change(this);
    });
    function Change(element) {
        var _URL = window.URL || window.webkitURL;
        var file, img;
        if ((file = element.files[0])) {
            img = new Image();
            img.onload = function () {
                element.width;
                element.height;
            };

            img.onerror = function () {
                element.value = null;
                sweetAlert("Uploaded failed", "File is not an image.  " + file.type, "error");
            };

            extension = getExt(file.name);

            if (!checkTypeImg(extension)) {
                element.value = null;
                sweetAlert("Uploaded failed", "Sorry, only JPG, JPEG, PNG & GIF files are allowed." + file.type, "error");

            } else if (!checkSizeImg(file)) {
                element.value = null;
                sweetAlert("Uploaded failed", " large image size, maximum allowed 3 MB", "error");
            }
            img.src = _URL.createObjectURL(file);
        }

    }
    function ascii(a) {
        return a.charCodeAt(0);
    }

    function checkNum($value) {
        $arr = $value.split("");
        for ($i = 0; $i < $arr.length; $i++) {
            $as = ascii($arr[$i]);
            if ($as < 48 || $as > 57)
                return false;
        }
        return true;
    }

    function checkChar($value) {

        $arr = $value.split("");

        for ($i = 0; $i < $arr.length; $i++) {
            $as = ascii($arr[$i]);
            if ($as === 32)
                continue;//if value = space
            else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122))
            {
                continue;
            } else
            {
                return false;
            }
        }
        return true;
    }

    function checkNum_Char($value) {
        $arr = $value.split("");
        for ($i = 0; $i < $arr.length; $i++) {
            $as = ascii($arr[$i]); //Return the ASCII value of character
            if ($as === 32)
                continue;
            else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122) || ($as >= 48 && $as <= 57))
                continue;
            else
                return false;

        }

        return true;
    }


    $('#add_new_property').click(function (e) {
        $img1 = false;
        $img2 = false;
        $img3 = false;
        $img4 = false;
        $name = false;
        $price = false;
        $type = false;
        $quantity = false;
        $description = false;
        $area=false;
        if ($("#img1").val() == "") {
            //alert("c");
            sweetAlert("Oops...", "Upload image1", "error");
        } else {
            $img1 = true;
        }
        if (($("#img2").val() == "") && $img1) {
            //alert("c");
            sweetAlert("Oops...", "Upload image2", "error");
        } else {
            $img2 = true;
        }
        if (($("#img3").val() == "") && $img1 && $img2) {
            //alert("c");
            sweetAlert("Oops...", "Upload image3", "error");
        } else {
            $img3 = true;
        }
        if (($("#img4").val() == "") && $img1 && $img2 && $img3) {
            //alert("c");
            sweetAlert("Oops...", "Upload image4", "error");
        } else {
            $img4 = true;
        }
        if ((!checkNum_Char($("#property_name").val()) || $("#property_name").val().length < 3 || $("#property_name").val().length > 20) && $img1 && $img2 && $img3 && $img4) {
            sweetAlert("Oops...", "Product Name must be at least 4 characters, no special characters allowed", "error");
            // alert("Product Name must be at least 4 characters, no special characters allowed");
        } else {
            $name = true;

        }
        if ((!checkNum_Char($("#cities").val())) && $name && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "Product type must be at least 4 characters, no special characters allowed", "error");
        } else {
            $type = true;

        }
        if ((!checkNum_Char($("#catagories").val())) && $name && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "Product type must be at least 4 characters, no special characters allowed", "error");
        } else {
            $type = true;

        }
        if ((!checkNum($("#price").val()) || $("#price").val().length < 1 || $("#price").val().length > 10) && $name && $type && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "Product price must be Numbers, no characters allowed", "error");
        } else {
            $price = true;

        }
        if ((!checkNum($("#area").val()) || $("#area").val().length < 1 || $("#area").val().length > 10) && $price && $name && $type && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "area must be Numbers, no characters allowed", "error");
        } else {
            $area = true;

        }
        if (($("#Descripton").val().length < 1 || $("#Descripton").val().length > 300) && $name && $area && $type && $price && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "Descrtion should me under 300 characters", "error");

        } else {
            $description = true;
        }
        if ($name && $type && $price && $description && $img1 && $img2 && $img3 && $img4) {
            $('#add-property').attr('action', '../includes/addproperty.php');
            $('#add-property').submit();
        } else {
            e.preventDefault();

        }


    });

});

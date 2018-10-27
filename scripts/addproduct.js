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

    $("#fileToUpload1").change(function () {
        Change(this);
    });
    $("#fileToUpload2").change(function () {
        Change(this);
    });
    $("#fileToUpload3").change(function () {
        Change(this);
    });
    $("#fileToUpload4").change(function () {
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


    $('#button').click(function (e) {
        $img1 = false;
        $img2 = false;
        $img3 = false;
        $img4 = false;
        $name = false;
        $price = false;
        $type = false;
        $quantity = false;
        $info = false;
        $offer = false;

        if ($("#fileToUpload1").val() == "") {
            //alert("c");
            sweetAlert("Oops...", "Upload image1", "error");
        } else {
            $img1 = true;
        }
        if (($("#fileToUpload2").val() == "") && $img1) {
            //alert("c");
            sweetAlert("Oops...", "Upload image2", "error");
        } else {
            $img2 = true;
        }
        if (($("#fileToUpload3").val() == "") && $img1 && $img2) {
            //alert("c");
            sweetAlert("Oops...", "Upload image3", "error");
        } else {
            $img3 = true;
        }
        if (($("#fileToUpload4").val() == "") && $img1 && $img2 && $img3) {
            //alert("c");
            sweetAlert("Oops...", "Upload image4", "error");
        } else {
            $img4 = true;
        }


        if ((!checkNum_Char($("#name").val()) || $("#name").val().length < 3 || $("#name").val().length > 20) && $img1 && $img2 && $img3 && $img4) {
            sweetAlert("Oops...", "Product Name must be at least 4 characters, no special characters allowed", "error");
            // alert("Product Name must be at least 4 characters, no special characters allowed");
        } else {
            $name = true;

        }
        if ((!checkNum_Char($("#type").val()) || $("#type").val().length < 3 || $("#type").val().length > 20) && $name && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "Product type must be at least 4 characters, no special characters allowed", "error");
        } else {
            $type = true;

        }
        if ((!checkNum($("#price").val()) || $("#price").val().length < 1 || $("#price").val().length > 10) && $name && $type && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "Product price must be Numbers, no characters allowed", "error");
        } else {
            $price = true;

        }
        if ((!checkNum($("#offer").val()) || $("#offer").val().length <= 0 || $("#offer").val() < 0 || $("#offer").val() > 100) && $name && $type && $price && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "Offer must be between 0 and 100", "error");
        } else {
            $offer = true;

        }
        if ((!checkNum($("#quantity").val()) || $("#quantity").val().length < 1 || $("#quantity").val().length > 10 || $("#quantity").val() <= 0) && $name && $type && $price && $offer && $img1 && $img2 && $img3 && $img4) {
            sweetAlert("Oops...", "Product quantity must be Numbers, no characters allowed", "error");
        } else {
            $quantity = true;
        }
        
        if (($("#info").val().length < 1 || $("#info").val().length > 300) && $name && $type && $price && $offer && $quantity && $img1 && $img2 && $img3 && $img4) {

            sweetAlert("Oops...", "Product info have maximum 300 characters", "error");

        } else {
            $info = true;
        }
        if ($name && $type && $price && $offer && $quantity && $info && $img1 && $img2 && $img3 && $img4) {
            $('#form-add-product').attr('action', '../includes/validation.php');
            $('#form-add-product').submit();
        } else {
            e.preventDefault();

        }


    });

});

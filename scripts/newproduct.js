function reserve(goodid, traderid) {
    var quantity = parseInt(document.getElementById('quantity').innerText);
    var reserved = document.getElementById('res').value;
    if (reserved <= 0 || reserved > quantity) {
        sweetAlert("Oops...", "reserved quantity must be larger than 0 and less than the available quantity, no characters allowed", "error");
    } else {
        swal({title: "Reserve Proudct", text: "Are you sure  to reserve this product",
            type: "info", showCancelButton: true, closeOnConfirm: false, showLoaderOnConfirm: true},
                function () {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', '../includes/reservegood.php?id=' + goodid + "&resQuantity=" + reserved);
                    xhr.send();
                    xhr.onload = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {

                        }
                    };
                    setTimeout(function () {
                        swal("Reserve is ready!");  window.location.href = window.location.href;
                        
                    }, 1000);
 
                });
               
    }
}

<table class="table table-responsive table-bordered table-striped">
<thead><tr><th>Property Name</th>
                            <th>Property Type</th>
                            <th>Property Owner</th>
                            <th>Date</th>
                            <th>Accepted/Rejected</th>
                            <th>Canceled</th>
                          </tr>
                        </thead>
                        <tbody id='notificationbody'>
                        </tbody>
</table>
<script>
    setTimeout(function(){$.post("../includes/buyernotifications.php",
    {
            lastinterestid:0
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, We can't get your notifications", "error");
        }
        else{
    $notificationbody=$('#notificationbody');
    $notificationbody.html(data+$notificationbody.html());
        }
    });},1000);
    setInterval(function(){$.post("../includes/buyernotifications.php",
    {
            lastinterestid:1
    },
    function(data, status){
        if(data=='0'){
             sweetAlert("Oops...", "It looks like something wrong happend, We can't get your notifications", "error");
        }
        else{
    $notificationbody=$('#notificationbody');
    $notificationbody.html(data+$notificationbody.html());
        }
    });},5000);
</script>
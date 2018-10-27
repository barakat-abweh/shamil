
$(document).ready(function () { 
     $(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() === $(document).height()) {
       showMore($_GET['id']);
   }
});

    $(document).scroll(function () {
        if (scrollY > 455) {
            $('#navprofile').hide('swing');
        }
        if (scrollY <= 455 && $(document).width() > 768) {
            $('#navprofile').show('swing');
        }
    });



       var $_GET = {},
    args = location.search.substr(1).split(/&/);
for (var i=0; i<args.length; ++i) {
    var tmp = args[i].split(/=/);
    if (tmp[0] != "") {
        $_GET[decodeURIComponent(tmp[0])] = decodeURIComponent(tmp.slice(1).join("").replace("+", " "));
    }
};








var flag = true;
    $('#navprofile').click(
            function () {
                if (flag) {
                    $("#sidebar").show("swing");
                    $('#navprofile').animate({height: '50px', width: '50px'});
                    $('#user').hide("swing");
                    flag = false;
                } else {
                    $("#sidebar").hide("swing");
                    $('#navprofile').animate({height: '75px', width: '75px'});
                    $('#user').show("swing");
                    flag = true;

                }




            }
    );











});


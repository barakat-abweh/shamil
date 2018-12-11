<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
          </div>
            <div class="inbox_chat" id="conv">
          </div>
            <script>
            setInterval(function (){
                $.post("../includes/conversations.php",
    {
        init:0
    },
    function(data, status){
        if(data=='0'|| status!="success"){
             sweetAlert("Oops...", "It looks like something wrong happend, try again", "error");
        }
        else{
            $('#conv').html(data);
        }
});
            },1000);
            </script>

        </div>
          <div class="mesgs">
          <div class="msg_history" id="messagesbody">
              
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
                <input type="text" class="write_msg" id="writem" placeholder="Type a message" />
                <button class="msg_send_btn" type="button" onclick="sendMessage()"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>   
           
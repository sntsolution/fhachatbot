<html>
<head>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="js/jquery.min.js"></script>
<style>
@import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);	
body {
 font-family: 'Open Sans', sans-serif;
 
  padding-top: 15px;
  padding-bottom: 15px;
}
#chatborder {
    background-color: #FFF2E7;
    border-width: 3px;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: 20px;
    margin-right: 20px;
    padding-top: 10px;
    padding-right: 20px;
    padding-left: 15px;
    border-radius: 4px;
    width: 270px;
    height: 470px;
}
.chatlog {
   font: 15px arial, sans-serif;
   height: 400px;
   width: 277px;
   
}
#msg {
     font: 17px arial, sans-serif;
    height: 38px;
    width: 100%;
    margin-top: 10px;
    border-radius: 10px;
    text-align: center;
}
.user
{
	background-color: #F5AC77;
	float: right;
	border-radius: 5px;
    padding: 13px;
    color: white;
	border: 5px solid transparent;
    right: auto;
	left: -10px;
    
    border-left-color: transparent;
	font-family: 'Open Sans', sans-serif;
	margin-left: 35%;
}
.bot
{
    background-color:white;
    float: left;
    border-radius: 5px;
    padding: 13px;
    opacity: 0.9;
    color: black;
    top: 10px;
    right: -10px;
    border: 5px solid transparent;
    
    font-family: 'Open Sans', sans-serif;
}
#chat{
	overflow-y: auto;
}
#chat::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}
#chat::-webkit-scrollbar
{
	width: 5px;
	background-color: #F5F5F5;
}
#chat::-webkit-scrollbar-thumb
{
	background-color: #3588eb;
	border: 1px solid #555555;
	border-radius: 100px;
}
	ul{  
                background-color:#eee;  
                cursor:pointer;  
           }  
           li{  
                padding:7px;  
           }
	
.su::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}
.su::-webkit-scrollbar
{
	width: 5px;
	background-color: #F5F5F5;
}
.su::-webkit-scrollbar-thumb
{
	background-color: #3588eb;
	border: 1px solid #555555;
	border-radius:100px;
	
}
.su{
	height: 150px;
	overflow-y: auto;
}
.txtopt{
	
	background-color: transparent;
    border-radius: 50px;
    border-style: solid;
    border-color: #3181f6;
	margin-bottom: 5%;
	height:6%;
}
</style>
<script type="text/javascript">
 $(function () {
 	 $("#msg").focus();
 	 
 	 
 var initialmsg="<p class='chat-content bot'>Welcome to FHAChatbot. Greetings with 'Hi' to know available options.</p>";
 $("div#chat").append(initialmsg);
        $('form').bind('submit', function (event) {

		event.preventDefault();// using this page stop being refreshing 
         var msg=$("#msg").val();
         if(msg == "" || msg == " "){
		 $("#msg").val("");
		  
	 }
	 else{
	 	var html="";
          $.ajax({
            type: 'POST',
            url: 'find.php',
            data: $('form').serialize(),
            success: function (response) {
              //alert('form was submitted'+response);
              $("#msg").val("");
		    
			  var obj = jQuery.parseJSON(response);
			   if(typeof obj.chat.bot.reply != "undefined"){
			   
			
					     for(var key in obj.chat.bot.reply) {
					    var value = obj.chat.bot.reply[key];
					    //alert("value"+value);
					     html +=           
					                "<br><input type='button' value='"+value+"' name='PASS' onClick='myfunction(this.value)' class='txtopt'/>";
									var txtval= "<p class='user'>"+obj.chat.user +"</p><p class='bot'>"+ html +"<\p>"; 
				}
				
			   
			   }else{
					var txtval= "<p class='user'>"+obj.chat.user +"</p><p class='bot'>"+ obj.chat.bot +"<\p>";
				}	
			
			  //var txtval= "<p class='user'>"+obj.chat.user +"</p><p class='bot'>"+ html +"<\p>";
			// alert( obj.chat.user +"\n"+obj.chat.bot+"\n");
			 if(typeof obj.chat.cid != "undefined"){
			 	$("#Id").val(obj.chat.cid);
			 }
			 if(typeof obj.chat.uid != "undefined"){
			 	$("#UId").val(obj.chat.uid);
			 }
			 if(typeof obj.chat.nid != "undefined"){
			 	$("#id").val(obj.chat.nid);
			 }
			 if(typeof obj.chat.vid != "undefined"){
			 	$("#vid").val(obj.chat.vid);
			 }
			 if(typeof obj.chat.wid != "undefined"){
			 	$("#wid").val(obj.chat.wid);
			 }
			  $("div#chat").append(txtval).html();
			  
			  $(".msg_container_base").stop().animate({ scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);	
           
	    }
            
          });
	 }
         });
      });


function myfunction(str){
	//alert(str);
	var Id = $("#Id").val();
	var UId = $("#UId").val(); 
	var id = $("#id").val();
	var wid= $("#wid").val();
	var vid= $("#vid").val();
	
	var html1="";
	      $.ajax({
            type: 'POST',
            url: 'find.php',
            data: {msg: str,Id:Id,id:id,UId:UId,vid:vid,wid:wid},
            success: function (response) {
             $("#msg").val("");
		      //alert(response);
			  var obj = jQuery.parseJSON(response);	
			  //alert(obj.chat.user+obj.chat.bot);
			  
			   if(typeof obj.chat.bot.reply != "undefined"){
			  
               for(var key in obj.chat.bot.reply) {
    var value = obj.chat.bot.reply[key];
    //alert("value"+value);
     html1 +=           
                "<br><input type='button' value='"+value+"' name='opt' class='txtopt' onClick='myfunction(this.value)' class='txtopt' />";
                
               
                
}
 var txtval= "<p class='user'>"+obj.chat.user +"</p><p class='bot'>"+ html1 +"<\p>";
  if(typeof obj.chat.cid != "undefined"){
				 	$("#Id").val(obj.chat.cid);
				 }
				 if(typeof obj.chat.uid != "undefined"){
				 	$("#UId").val(obj.chat.uid);
				 }
				 if(typeof obj.chat.nid != "undefined"){
				 	$("#id").val(obj.chat.nid);
				 }
				 if(typeof obj.chat.vid != "undefined"){
				 	$("#vid").val(obj.chat.vid);
				 }
				 if(typeof obj.chat.wid != "undefined"){
				 	$("#wid").val(obj.chat.wid);
				 }
 $("div#chat").append(txtval).html();
 $("#msg").focus();
			  $(".msg_container_base").stop().animate({ scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);	
			  }
			  else{
			  	 var txtval= "<p class='user'>"+obj.chat.user +"</p><p class='bot'>"+ obj.chat.bot +"<\p>";
				 //alert( obj.chat.user +"\n"+obj.chat.bot+"\n");
				 if(typeof obj.chat.cid != "undefined"){
				 	$("#Id").val(obj.chat.cid);
				 }
				 if(typeof obj.chat.uid != "undefined"){
				 	$("#UId").val(obj.chat.uid);
				 }
				 if(typeof obj.chat.nid != "undefined"){
				 	$("#id").val(obj.chat.nid);
				 }
				 if(typeof obj.chat.vid != "undefined"){
				 	$("#vid").val(obj.chat.vid);
				 }
				 if(typeof obj.chat.wid != "undefined"){
				 	$("#wid").val(obj.chat.wid);
				 }
				  $("div#chat").append(txtval).html();
				  $("#msg").focus();
				  $(".msg_container_base").stop().animate({ scrollTop: $(".msg_container_base")[0].scrollHeight}, 1000);	
			  }
         }
		});
       
}

</script>
</head>
<body>
<form name="chatform">
<div id='chatborder'>
<div class="chatlog msg_container_base" id="chat">
<!--<textarea name="chat" id="chat" cols="60" rows="20"></textarea>-->

</div>
<div class="uinput">
<input name="msg" id="msg" placeholder="Enter message here.." size="50" autocomplete="off" />
<div id="chtmsg" class="su"></div>
</div>	
</div>
<!--<input type="submit" name="submit" value="send"/>-->
<input type="hidden" name="Id" id="Id" />
<input type="hidden" name="UId" id="UId" />
<input type="hidden" name="id" id="id" />
<input type="hidden" name="vid" id="vid" />
<input type="hidden" name="wid" id="wid" />
</form>

</body>
</html>

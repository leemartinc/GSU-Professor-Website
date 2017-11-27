$(document).ready(function(){
var chatInterval = 2500;
var date = new Date();
var time=date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
	

$("#chatInput").keypress(function(event){
	if(event.which == 13){
		event.preventDefault();
		$("#sendButton").click();
	}
});
$count=0;

$('#liveChatButton').click(function(){
	$("#liveChatButton").hide();
	$("#liveChat").show();
});


$('#sendButton').click(function(){

	var message=$('#chatInput').val();

	var studentMessageContainer="<div class='container1'>"+
		"<img src='./img/student.svg' alt='studentImg' style='width:100%'>"+
		"<p class='studentMessage'>" +message+
		"</p>"+
		"<span class='time' id='studentTime'>"+time+" </span></div>"


if(message===''){
		alert("message body can't be empty!");
}

else{

$('#chatWindow').append(studentMessageContainer);
	updateScroll();
	$('#chatInput').val('');
	

$.ajax({
   method: "POST",
   url:"twilioOutbound.php",
   data:{input : message}
})
	.done(function(data){
		$('#chatWindow').append(data);
		updateScroll();
	
	})


}
});

$('#minimize').click(function(){
	$('#liveChat').hide();
	$('#liveChatButton').show();
});




function updateScroll(){
    var element = document.getElementById("chatWindow");
    element.scrollTop = element.scrollHeight;
}
var thisData=0;
var lastData=1;
function retrieveMessages() {
    $.ajax({
     method: "POST",
     url:"readDB.php",
     })
    .done(function(data){
      thisData=data;
      console.log(data);
      if(lastData == 1){
        lastData=data;
      }else
      if(lastData != thisData){
        appendProfessor(data);
        lastData=1;
      }
    
    })
    }
function appendProfessor(body){
var professorResponse ="<div class='container1'>"+
        "<img src='./img/professor.svg' alt='ProfessorImg' style='width:100%' id='ProImg'>"+
        "<p class='studentMessage'>" +body+
        "</p>"+
        "<span class='time' id='StudentTime'>"+time+" </span></div>"
    $('#chatWindow').append(professorResponse);
    updateScroll();

}

setInterval(function () {
        retrieveMessages();
    }, chatInterval);

/*
// SSE TESTING -------------------------

if(typeof(EventSource !== "undefined")){
var source = new EventSource('middleMan.php');
source.addEventListener('message', function(e) {
  console.log(e);
    
}, false);}
else{
    console.log("Sorry SSE is not working");
}





// SSE TESTING ------------------------- */


/* long polling
var timestamp = 0;

function getContent()
{
 
 $.ajax(
        {
            type: 'GET',
            url: 'waitForMessage.php?timestamp='+timestamp,
            dataType:'json',
            async:true,
            cache:false,
            
            success: function(data){
                // put result data into "obj"
                var output = eval('('+data+')');
                // 3333put the data_from_file into #response
                alert(output);
                var msg= output['msg'];
				$('#chatWindow').append(msg);
                updateScroll();
                // call the function again, this time with the timestamp we just got from server.php
                timestamp=output['timestamp'];
                getContent();
              
            }
        }
    );
}

getContent(); //start waiting for incoming message

*/
});
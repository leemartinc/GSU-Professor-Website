$(document).ready(function(){

	

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
	var status= "<p id='status'>Delivered</p>";
	var date = new Date();
	var time=date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
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
   url:"sendSMS.php",
   data:{input : message}
})
	.done(function(data){
		$('#chatWindow').append(status);
		updateScroll();
	
	})


}
});

$('#minimize').click(function(){
	$('#liveChat').hide();
	$('#liveChatButton').show();
})

function updateScroll(){
    var element = document.getElementById("chatWindow");
    element.scrollTop = element.scrollHeight;
}




});
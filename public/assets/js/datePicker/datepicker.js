 var BASE_URL = "http://localhost:8887/";

 $(function() {
 	var myDate = new Date();

	var now = myDate.getFullYear() + '-' +(myDate.getMonth()+1) + '-' + (myDate.getDate());
	var lastMonth = myDate.getFullYear() + '-' + myDate.getMonth() + '-' + (myDate.getDate());
 	$( "#finishTime" ).val(now);
	$( "#startTime" ).val(lastMonth);

 	$( "#startTime" ).datepicker({ dateFormat: "yy-mm-dd" });	
 	$( "#finishTime" ).datepicker({ dateFormat: "yy-mm-dd" });
 });


function show(){

 	var startTime = $('#startTime').val();
 	var finishTime = $('#finishTime').val();

 	//if(startTime > finishTime){
 	//		alert('起止时间不能大于结束时间');
 	//		return;
 //	}else{
	 	$.get('analyse/chat/place?createImage=1',{startTime:startTime, finishTime:finishTime}, function(data) {
				$("img").attr({ 
				  src: BASE_URL+"jimage.jpg"
				});
	    });	
 //	}
}


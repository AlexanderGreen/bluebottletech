$(document).ready(function(){
	//main menu effect
$(".nav ul li").mouseenter(function(){
	var id=$(this).attr("id");
	$("#"+id).css("background","#0b4094");
	id=id.replace("ml","mdl");
	$(".menudownlist").css("display","none");
	$("#"+id).css("display","block");
});
$(".nav ul li").mouseleave(function(){
	var id=$(this).attr("id");
	$("#"+id).css("background","transparent");
	id=id.replace("ml","mdl");
	$("#"+id).css("display","none");
});
$(".menudownlist").mouseleave(function(){
	$(".menudownlist").css("display","none");
});
$("header").mouseleave(function(){
	$(".menudownlist").css("display","none");
});

});
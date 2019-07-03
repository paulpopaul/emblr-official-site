$(document).ready(function(){
	$(".servicio-minimizadof1").hide();
	$(".servicio-minimizadof13").hide();
    /*$("#min-2").hide();
    $("#min-3").hide();*/
    $("#servicio-4").hide();
    $("#servicio-5").hide();
    $("#servicio-6").hide();
    $("#servicio-7").hide();
    $("#servicio-8").hide();
    $("#servicio-9").hide();


$(".servicio-minimizadof2").click(function(){
	$(".servicio-minimizadof2").hide();
	$(".servicio-minimizadof23").hide();
	$(".servicio-minimizadof1").show();
	$(".servicio-minimizadof13").show();
	$("#servicio-1").hide();
    $("#servicio-2").hide();
    $("#servicio-3").hide();
    $("#servicio-4").slideDown(800);
    $("#servicio-5").slideDown(800);
    $("#servicio-6").slideDown(800);

	});	

$(".servicio-minimizadof1").click(function(){
	$(".servicio-minimizadof1").hide();
	$(".servicio-minimizadof13").hide();
	$(".servicio-minimizadof2").show();
	$(".servicio-minimizadof23").show();
	$("#servicio-4").hide();
    $("#servicio-5").hide();
    $("#servicio-6").hide();
    $("#servicio-3").slideDown();
	$("#servicio-1").slideDown();
    $("#servicio-2").slideDown();

	});	

});	




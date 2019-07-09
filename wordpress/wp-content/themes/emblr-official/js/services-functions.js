$(document).ready(function(){
	$("#fila1 .servicio-minimizado").hide();
    $("#fila2-servicio").hide();
    $("#fila3-servicio").hide();
    $("#fila4-servicio").hide();
    $("#fila5-servicio").hide();

$("#fila1").click(function(){
    $(".servicio-minimizado").show();
    $("#fila1 .servicio-minimizado").hide();
    $(".descripcion").hide();
    $("#fila1-servicio").slideDown();  
    }); 

$("#fila2").click(function(){
    $(".servicio-minimizado").show();
    $("#fila2 .servicio-minimizado").hide();
    $(".descripcion").hide();
    $("#fila2-servicio").show();  
    }); 

$("#fila3").click(function(){
    $(".servicio-minimizado").show();
    $("#fila3 .servicio-minimizado").hide();
    $(".descripcion").hide();
    $("#fila3-servicio").show(); 
    }); 

$("#fila4").click(function(){
    $(".servicio-minimizado").show();
    $("#fila4 .servicio-minimizado").hide();
    $(".descripcion").hide();
    $("#fila4-servicio").show();  
    }); 

$("#fila5").click(function(){
    $(".servicio-minimizado").show();
    $("#fila5 .servicio-minimizado").hide();
    $(".descripcion").hide();
    $("#fila5-servicio").show();  
    }); 

});	




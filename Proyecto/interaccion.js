$('.toggle').click(function(){
	if(document.getElementById('alternar').innerText =="Crear Cuenta"){
		document.getElementById('alternar').innerHTML = "Iniciar Sesión";
	}else{
		document.getElementById('alternar').innerHTML = "Crear Cuenta";
	}
	$('.formulario').animate({
		height:"toggle",
		'padding-top': 'toggle',
		'padding-bottom': 'toggle',
		opacity: 'toggle'
	}, "slow");
});
$(document).ready(function(){
	btnIrArriba = document.getElementById('ir-arriba').style.display="none";
	btnIrArriba = document.getElementById('ir-arriba').style.visibility="visible";
	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	}); 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){			
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	}); 
});
$(document).ready(function(){
	$('#button-menu').click(function(){
		if($('#button-menu').attr('class') == 'fa fa-bars' ){
			$('.navegacion').css({'width':'100%', 'background':'rgba(0,0,0,.7)'});
			$('#button-menu').removeClass('fa fa-bars').addClass('fa fa-times');
			$('.navegacion .menu').css({'left':'0px'}); 
		} else{
			$('.navegacion').css({'width':'0%', 'background':'rgba(0,0,0,.0)'});
			$('#button-menu').removeClass('fa fa-times').addClass('fa fa-bars');
			$('.navegacion .submenu').css({'left':'-320px'}); 
			$('.navegacion .menu').css({'left':'-320px'});
		}
	});
});
function startTime() {
    var hoy = new Date();
    var hora = hoy.getHours();
    var minutos = hoy.getMinutes();
    var segudos = hoy.getSeconds();
    minutos = checkTime(minutos);
    segudos = checkTime(segudos);
    document.getElementById("reloj1").innerHTML = hora + " : " + minutos + " : " + segudos;
    document.getElementById("reloj2").innerHTML = hora + " : " + minutos + " : " + segudos;
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
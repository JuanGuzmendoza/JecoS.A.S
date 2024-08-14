(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);


// FUNCIONES CIRCULOS
function updateProgress(value, circleId) {
	// Verificar que esté dentro del rango permitido
	if (value < 0) value = 0;
	if (value > 100) value = 100;
  
	// Determinar el color del progreso
	let color;
	if (value <= 30) {
		color = '#ff4c4c'; // Rojo para 0-30%
	} else if (value <= 60) {
		color = '#ffa500'; // Naranja para 31-60%
	} else {
		color = '#4caf50'; // Verde para 61-100%
	}
  
	// Actualizar el fondo del círculo específico
	const progressCircle = document.getElementById(circleId);
	progressCircle.style.background = `conic-gradient(${color} 0% ${value}%, #f3f3f3 ${value}% 100%)`;
  }

// FUNCION PARA LOS INPUTS DE COSTO
  function formatMoney(value) {
	// Convierte el valor a un número entero y lo formatea como moneda
	return new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP', minimumFractionDigits: 0 }).format(value);
  }
  
  function handleInput(event) {
	let input = event.target;
	let value = input.value.replace(/[^\d]/g, ''); // Elimina caracteres no numéricos
  
	if (value !== '') {
		// Convierte a número entero
		let numericValue = Math.floor(Number(value));
		input.value = formatMoney(numericValue);
	} else {
		input.value = '';
	}
  }
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
  function myFunction() {
    // Obtener el valor de búsqueda
    var input, filter, table, tr, accordion, cardHeaders, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();

    // Filtrar en la vista de escritorio (tabla)
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        var rowVisible = false;
        var td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    rowVisible = true;
                    break;
                }
            }
        }
        tr[i].style.display = rowVisible ? "" : "none";
    }

    // Filtrar en la vista móvil (accordion)
    accordion = document.getElementById("accordionExample");
    cardHeaders = accordion.getElementsByClassName("card-header");

    for (i = 0; i < cardHeaders.length; i++) {
        var cardVisible = false;
        var cardBody = cardHeaders[i].nextElementSibling;
        var paragraphs = cardBody.getElementsByTagName("p");

        // Verifica si alguno de los párrafos en la card coincide con el filtro
        for (j = 0; j < paragraphs.length; j++) {
            if (paragraphs[j]) {
                txtValue = paragraphs[j].textContent || paragraphs[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    cardVisible = true;
                    break;
                }
            }
        }

        // Mostrar u ocultar el card (accordion)
        cardHeaders[i].style.display = cardVisible ? "" : "none";
    }
}

  function selectRow(row) {
	// Deshabilita las entradas de todas las filas excepto la seleccionada
	document.querySelectorAll('.custom-table tr').forEach(tr => {
	  if (tr !== row) {
		tr.classList.remove('table-active');
		tr.querySelectorAll('input').forEach(input => {
		  input.disabled = true;
		});
	  }
	});

	// Agrega la clase 'table-active' a la fila seleccionada
	row.classList.add('table-active');

	// Habilita las entradas de la fila seleccionada
	row.querySelectorAll('input').forEach(input => {
	  input.disabled = false;
	});

	// Recupera la ID de la fila seleccionada
	const id = row.getAttribute('data-id');
	console.log('ID de la fila seleccionada:', id);
  }

  // cambio de icono en boton filtros
  let collapseButton = document.querySelector('[data-toggle="collapse"]');
  let collapseIcon = document.getElementById('collapse-icon');

  collapseButton.addEventListener('click', function() {
    if (collapseIcon.classList.contains('fa-chevron-down')) {
      collapseIcon.classList.remove('fa-chevron-down');
      collapseIcon.classList.add('fa-chevron-up');
    } else {
      collapseIcon.classList.remove('fa-chevron-up');
      collapseIcon.classList.add('fa-chevron-down');
    }
  });
  document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            localStorage.setItem('selectedTab', this.id);
        });
    });

    // Recuperar el tab seleccionado al cargar la página
    const selectedTab = localStorage.getItem('selectedTab');
    if (selectedTab) {
        document.getElementById(selectedTab).classList.add('active');
    }
});

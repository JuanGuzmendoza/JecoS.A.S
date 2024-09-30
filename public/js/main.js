(function ($) {

    "use strict";

    var fullHeight = function () {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function () {
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
document.addEventListener('DOMContentLoaded', function() {
    const filterNameInput = document.getElementById('filter-name');
    const filterClientInput = document.getElementById('filter-client');
    const filterDateInput = document.getElementById('filter-date');
    const clearFiltersButton = document.getElementById('clear-filters');
    const table = document.getElementById('myTable');
    const rows = Array.from(table.querySelectorAll('tbody tr'));

    filterNameInput.addEventListener('input', filterTable);
    filterClientInput.addEventListener('input', filterTable);
    filterDateInput.addEventListener('input', filterTable);

    clearFiltersButton.addEventListener('click', function() {
        filterNameInput.value = '';
        filterClientInput.value = '';
        filterDateInput.value = '';
        filterTable();
    });

    function filterTable() {
        const filterName = filterNameInput.value.toLowerCase();
        const filterClient = filterClientInput.value.toLowerCase();
        const filterDate = filterDateInput.value;

        rows.forEach(row => {
            const name = row.children[6].textContent.toLowerCase();
            const client = row.children[2].textContent.toLowerCase();
            const date = row.children[3].querySelector('input').value;

            const matchName = name.includes(filterName);
            const matchClient = client.includes(filterClient);
            const matchDate = date.includes(filterDate);

            if (matchName && matchClient && matchDate) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
});

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

collapseButton.addEventListener('click', function () {
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





//DETECTOR DE FILAS
const table = document.getElementById('myTable');
const rows = table.rows;
let changedRows = 0;

const changedRowsSpan = document.getElementById('changed-rows');

document.querySelector('button[type="submit"]').addEventListener('click', (event) => {
    detectChanges(); // Call detectChanges before submitting the form
    if (changedRows > 0) {
        event.preventDefault(); // Prevent the form from submitting
        const confirmMessage = `Tiene ${changedRows} filas con cambios pendientes. ¿Seguro que desea actualizar?`;
        if (confirm(confirmMessage)) {
            // Si se confirma, se permite la actualización
            event.target.form.submit();
        }
    }
});

// Function to detect changes in rows
function detectChanges() {
    changedRows = 0;
    for (let i = 1; i < rows.length; i++) { // start from 1 because the first row is the header
        const row = rows[i];
        const inputs = row.querySelectorAll('input');
        let changed = false;

        inputs.forEach((input) => {
            if (input.value !== input.defaultValue) {
                changed = true;
            }
        });

        if (changed) {
            const button = row.querySelector('button');
            button.classList.add('changed');
            changedRows++;
        } else {
            const button = row.querySelector('button');
            button.classList.remove('changed');
        }
    }

    // Update the changed rows span
    changedRowsSpan.textContent = `(${changedRows} filas cambiadas)`;
}

// Add event listener to each input to detect changes
for (let i = 1; i < rows.length; i++) {
    const row = rows[i];
    const inputs = row.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('input', detectChanges);
    });
}

// Add event listener to navigation links
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach((link) => {
    link.addEventListener('click', (event) => {
        detectChanges(); // Call detectChanges before navigating to new page
        if (changedRows > 0) {
            event.preventDefault();
            const confirmMessage = `Tiene ${changedRows} filas con cambios pendientes. ¿Seguro que desea salir?`;
            if (!confirm(confirmMessage)) {
                return false;
            } else {
                // Si se confirma, se permite la navegación
                link.href = link.getAttribute('href');
            }
        }
    });
});



$(document).ready(function () {
    // Seleccionar todos los modales con id que comienza con "productos-"
    $('[id^="productos-"] table tbody tr td a').on('click', function () {
        var productId = $(this).data('product-id');
        var productoCodigo = $(this).data('product-codigo');
        var productoNombre = $(this).data('product-nombre');
        var productoCostUnit = $(this).data('product-cost-unit');

        // Formatear el valor de productoCostUnit
        var formattedCostUnit = productoCostUnit.toLocaleString('es-ES', { minimumFractionDigits: 0});
        console.log('Producto seleccionado:');
        console.log('ID:', productId);
        console.log('Código:', productoCodigo);
        console.log('Nombre:', productoNombre);
        console.log('Costo unitario:', formattedCostUnit);

        // Obtener el id del modal que se acaba de abrir
        var modalId = $(this).closest('.modal').attr('id');

        // Update the input fields with the selected product's information
        $('input[name="Fechas[' + productId + '][7]"]').val(formattedCostUnit);
        $('input[name="Fechas[' + productId + '][3]"]').val(productoCodigo);
        $('input[name="Fechas[' + productId + '][4]"]').val(productoNombre);
    });
});

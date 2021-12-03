'use strict';

document.addEventListener("DOMContentLoaded", function() {

    document.querySelector("#comboPackPresupuesto").addEventListener('change', calcularPrecio);
    document.querySelector("#comboExtraPresupuesto").addEventListener('change', calcularPrecio);
    document.querySelector("#comboPromocionPresupuesto").addEventListener('change', calcularPrecio);
});


var bSeVeFormularioBoda = true;
// var bSeVeFormularioPresupuesto = true;


//BOTONES
$("#btnEditarPresupuesto").click(validarPresupuesto);

$(document).ready(function() {

    cargarFechaDeHoy();

});


function cargarFechaDeHoy() { //Aqui obtengo la fecha actual

    var fecha = new Date();
    var mes = fecha.getMonth() + 1;
    var dia = fecha.getDate();
    var fechaActual = fecha.getFullYear() + '-' + (('' + mes).length < 2 ? '0' : '') + mes + '-' + (('' + dia).length < 2 ? '0' : '') + dia;
    $("#fechaPresupuesto").val(fechaActual);
}

function calcularPrecio() {
    let precioPackSeleccionado = document.getElementById("comboPackPresupuesto");
    let precioPack = parseFloat(precioPackSeleccionado.options[precioPackSeleccionado.selectedIndex].dataset.precio);

    let promocionSeleccionado = document.getElementById("comboPromocionPresupuesto");
    let precioPromocion = parseFloat(promocionSeleccionado.options[promocionSeleccionado.selectedIndex].dataset.precio);

    let precioExtraSeleccionado = document.getElementById("comboExtraPresupuesto");
    let arrayPrecioExtra = [];

    for (let i = 0; i < precioExtraSeleccionado.length; i++) {
        let iIds = precioExtraSeleccionado.options[i];
        if (iIds.selected == true)
            arrayPrecioExtra.push(parseFloat(iIds.dataset.precio));
    }
    let sumaExtra = 0
    for (let i of arrayPrecioExtra) {
        sumaExtra += i;
    }
    let total = 0;
    total += sumaExtra + precioPack;

    if (total != 0) {
        let aplicarDescuento = Math.round((precioPromocion * total) / 100, -2);
        total -= aplicarDescuento;
    }

    console.log(arrayPrecioExtra);
    console.log(precioPack);
    console.log(total);

    $("#precioTotal").val(total);
}

function validarPresupuesto(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombre = "";
    var errorPrecio = "";
    var errorDescripcion = "";

    //let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegPassword = /^[0-9]{8}$/;

    let nomPresupuesto = formulario_EditarPresupuesto.nomPresupuesto.value.trim();
    let precioTotal = formulario_EditarPresupuesto.precioTotal.value.trim();
    // let descripcion = formulario_EditarPresupuesto.descripcion.value.trim();

    if (nomPresupuesto.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarPresupuesto.nomPresupuesto.focus();
        }

        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Falta el nombre.";
        formulario_EditarPresupuesto.nomPresupuesto.classList.add("is-danger");

    } else {

        formulario_EditarPresupuesto.nomPresupuesto.classList.remove("is-danger");
        formulario_EditarPresupuesto.nomPresupuesto.classList.add("is-primary");
    }

    if (precioTotal == null || precioTotal.length == 0 || precioTotal == 0) {
        if (bValidarFormulario) {
            formulario_EditarPresupuesto.precioTotal.focus();
            bValidarFormulario = false;
        }
        errorPrecio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El precio no puede ser cero. Seleccione antes para calcular";
        formulario_EditarPresupuesto.precioTotal.classList.add("is-danger");

    } else {
        formulario_EditarPresupuesto.precioTotal.classList.remove("is-danger");
        formulario_EditarPresupuesto.precioTotal.classList.add("is-primary");
    }

    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({

            text: 'Presupuesto Actualizado con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_EditarPresupuesto.submit() }, 1500);
        //formulario_EditarExtra.reset();


    } else {
        swal.fire({
            // title: 'Debe seleccionar alguna opción para calcular el precio',
            html: '<p>' + errorNombre + "</p>" +
                '<p>' + errorPrecio + "</p>",
            //text: errores,
            icon: 'error',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }

}
console.log("JS PRESUPUESTO CARGADO CON EXITO");
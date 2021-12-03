'use strict';


var bSeVeFormularioBoda = true;

//BOTONES

$("#btnNuevoExtra").click(validarNuevoExtra);
// $("#btnPasarAPresupuesto").click(cambiarAFormularioPresupuesto);


$(document).ready(function() {


});

function validarNuevoExtra(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombre = "";
    var errorPrecio = "";
    var errorDescripcion = "";

    //let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegPassword = /^[0-9]{8}$/;

    let nomExtra = formulario_NuevoExtra.nomExtra.value.trim();
    let precioExtra = formulario_NuevoExtra.precioExtra.value.trim();
    let descripcion = formulario_NuevoExtra.descripcion.value.trim();


    if (nomExtra.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevoExtra.nomExtra.focus();
        }

        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Falta el nombre.";
        formulario_NuevoExtra.nomExtra.classList.add("is-danger");

    } else {

        formulario_NuevoExtra.nomExtra.classList.remove("is-danger");
        formulario_NuevoExtra.nomExtra.classList.add("is-primary");
    }

    if (precioExtra == null || precioExtra.length == 0) {
        if (bValidarFormulario) {
            formulario_NuevoExtra.precioExtra.focus();
            bValidarFormulario = false;
        }
        errorPrecio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El precio tiene que ser numérico.";
        formulario_NuevoExtra.precioExtra.classList.add("is-danger");

    } else {
        formulario_NuevoExtra.precioExtra.classList.remove("is-danger");
        formulario_NuevoExtra.precioExtra.classList.add("is-primary");
    }

    if (descripcion.length == 0) {
        if (bValidarFormulario) {
            formulario_NuevoExtra.descripcion.focus();
            bValidarFormulario = false;
        }
        errorDescripcion = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe haber alguna descripción.";
        formulario_NuevoExtra.descripcion.classList.add("is-danger");

    } else {
        formulario_NuevoExtra.descripcion.classList.remove("is-danger");
        formulario_NuevoExtra.descripcion.classList.add("is-primary");
    }

    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Extra Actualizado con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_NuevoExtra.submit() }, 1500);
        //formulario_EditarExtra.reset();


    } else {
        swal.fire({
            html: '<p>' + errorNombre + "</p>" +
                '<p>' + errorPrecio + "</p>" +
                '<p>' + errorDescripcion + "</p>",
            //text: errores,
            icon: 'warning',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }

}
console.log("JS EDITAR EXTRA CARGADO CON EXITO");
'use strict';

//BOTONES

$("#btnNuevoPack").click(validarNuevoPack);
// $("#btnPasarAPresupuesto").click(cambiarAFormularioPresupuesto);


$(document).ready(function() {


});

function validarNuevoPack(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombre = "";
    var errorPrecio = "";
    var errorDescripcion = "";

    //let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegPassword = /^[0-9]{8}$/;

    let nomPack = formulario_NuevoPack.nomPack.value.trim();
    let precioPack = formulario_NuevoPack.precioPack.value.trim();
    let descripcion = formulario_NuevoPack.descripcion.value.trim();


    if (nomPack.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevoPack.nomPack.focus();
        }

        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Falta el nombre.";
        formulario_NuevoPack.nomPack.classList.add("is-danger");

    } else {

        formulario_NuevoPack.nomPack.classList.remove("is-danger");
        formulario_NuevoPack.nomPack.classList.add("is-primary");
    }

    if (precioPack == null || precioPack.length == 0) {
        if (bValidarFormulario) {
            formulario_NuevoPack.precioPack.focus();
            bValidarFormulario = false;
        }
        errorPrecio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El precio tiene que ser numérico.";
        formulario_NuevoPack.precioPack.classList.add("is-danger");

    } else {
        formulario_NuevoPack.precioPack.classList.remove("is-danger");
        formulario_NuevoPack.precioPack.classList.add("is-primary");
    }

    if (descripcion.length == 0) {
        if (bValidarFormulario) {
            formulario_NuevoPack.descripcion.focus();
            bValidarFormulario = false;
        }
        errorDescripcion = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe haber alguna descripción.";
        formulario_NuevoPack.descripcion.classList.add("is-danger");

    } else {
        formulario_NuevoPack.descripcion.classList.remove("is-danger");
        formulario_NuevoPack.descripcion.classList.add("is-primary");
    }

    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Promoción Guardado con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_NuevoPack.submit() }, 1500);
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
console.log("JS NUEVA PROMOCION CARGADO CON EXITO");
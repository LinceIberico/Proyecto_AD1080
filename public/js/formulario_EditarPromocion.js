'use strict';


var bSeVeFormularioBoda = true;

//BOTONES

$("#btnEditarPromo").click(validarEditarPromocion);
// $("#btnPasarAPresupuesto").click(cambiarAFormularioPresupuesto);


$(document).ready(function() {


});

function validarEditarPromocion(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombre = "";
    var errorPrecio = "";
    var errorDescripcion = "";

    //let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegPassword = /^[0-9]{8}$/;

    let nomPromo = formulario_EditarPromocion.nomPromo.value.trim();
    let descuento = formulario_EditarPromocion.descuento.value.trim();
    let descripcion = formulario_EditarPromocion.descripcion.value.trim();


    if (nomPromo.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarPromocion.nomPromo.focus();
        }

        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Falta el nombre.";
        formulario_EditarPromocion.nomPromo.classList.add("is-danger");

    } else {

        formulario_EditarPromocion.nomPromo.classList.remove("is-danger");
        formulario_EditarPromocion.nomPromo.classList.add("is-primary");
    }

    if (descuento == null || descuento.length == 0) {
        if (bValidarFormulario) {
            formulario_EditarPromocion.descuento.focus();
            bValidarFormulario = false;
        }
        errorPrecio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El precio tiene que ser numérico.";
        formulario_EditarPromocion.descuento.classList.add("is-danger");

    } else {
        formulario_EditarPromocion.descuento.classList.remove("is-danger");
        formulario_EditarPromocion.descuento.classList.add("is-primary");
    }

    if (descripcion.length == 0) {
        if (bValidarFormulario) {
            formulario_EditarPromocion.descripcion.focus();
            bValidarFormulario = false;
        }
        errorDescripcion = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe haber alguna descripción.";
        formulario_EditarPromocion.descripcion.classList.add("is-danger");

    } else {
        formulario_EditarPromocion.descripcion.classList.remove("is-danger");
        formulario_EditarPromocion.descripcion.classList.add("is-primary");
    }

    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Promoción Actualizado con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_EditarPromocion.submit() }, 1500);
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
console.log("JS EDITAR PROMOCION CARGADO CON EXITO");
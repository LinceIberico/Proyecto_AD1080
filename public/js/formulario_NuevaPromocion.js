'use strict';


var bSeVeFormularioBoda = true;

//BOTONES

$("#btnNuevaPromo").click(validarNuevaPromocion);
// $("#btnPasarAPresupuesto").click(cambiarAFormularioPresupuesto);


$(document).ready(function() {


});

function validarNuevaPromocion(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombre = "";
    var errorPrecio = "";
    var errorDescripcion = "";

    //let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegPassword = /^[0-9]{8}$/;

    let nomPromo = formulario_NuevaPromocion.nomPromo.value.trim();
    let descuento = formulario_NuevaPromocion.descuento.value.trim();
    let descripcion = formulario_NuevaPromocion.descripcion.value.trim();


    if (nomPromo.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevaPromocion.nomPromo.focus();
        }

        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Falta el nombre.";
        formulario_NuevaPromocion.nomPromo.classList.add("is-danger");

    } else {

        formulario_NuevaPromocion.nomPromo.classList.remove("is-danger");
        formulario_NuevaPromocion.nomPromo.classList.add("is-primary");
    }

    if (descuento == null || descuento.length == 0) {
        if (bValidarFormulario) {
            formulario_NuevaPromocion.descuento.focus();
            bValidarFormulario = false;
        }
        errorPrecio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El precio tiene que ser numérico.";
        formulario_NuevaPromocion.descuento.classList.add("is-danger");

    } else {
        formulario_NuevaPromocion.descuento.classList.remove("is-danger");
        formulario_NuevaPromocion.descuento.classList.add("is-primary");
    }

    if (descripcion.length == 0) {
        if (bValidarFormulario) {
            formulario_NuevaPromocion.descripcion.focus();
            bValidarFormulario = false;
        }
        errorDescripcion = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe haber alguna descripción.";
        formulario_NuevaPromocion.descripcion.classList.add("is-danger");

    } else {
        formulario_NuevaPromocion.descripcion.classList.remove("is-danger");
        formulario_NuevaPromocion.descripcion.classList.add("is-primary");
    }

    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Promoción Guardada con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_NuevaPromocion.submit() }, 1500);
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
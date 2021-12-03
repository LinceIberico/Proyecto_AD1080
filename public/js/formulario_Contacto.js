'use strict';

//BOTONES
$("#btnEnviarContacto").click(validarEnvioContacto);

$(document).ready(function() {

});


function validarEnvioContacto(evento) {

    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombreContacto = "";
    var errortlfContacto = "";
    var errorFechaContacto = "";
    var errorEmailContacto = "";
    var errorMensajeContacto = "";

    let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegTelefono = /^[0-9]{9}$/;

    let nombreContacto = formulario_contacto.nombreContacto.value.trim();
    let tlfContacto = parseInt(formulario_contacto.tlfContacto.value.trim());
    let fechaContacto = formulario_contacto.fechaContacto.value.trim();
    let emailContacto = formulario_contacto.emailContacto.value.trim();
    let mensajeContacto = formulario_contacto.mensajeContacto.value.trim();

    if (nombreContacto.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_contacto.nombreContacto.focus();
        }
        errorNombreContacto = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre está vacío.";
        formulario_contacto.nombreContacto.classList.add("is-danger");

    } else {
        formulario_contacto.nombreContacto.classList.remove("is-danger");
        formulario_contacto.nombreContacto.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfContacto)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_contacto.tlfContacto.focus();
        }
        errortlfContacto = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido.";
        formulario_contacto.tlfContacto.classList.add("is-danger");

    } else {
        formulario_contacto.tlfContacto.classList.remove("is-danger");
        formulario_contacto.tlfContacto.classList.add("is-primary");
    }

    if (fechaContacto.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_contacto.fechaContacto.focus();
        }
        errorFechaContacto = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una fecha válida.";
        formulario_contacto.fechaContacto.classList.add("is-danger");

    } else {
        formulario_contacto.fechaContacto.classList.remove("is-danger");
        formulario_contacto.fechaContacto.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailContacto)) {
        if (bValidarFormulario) {
            formulario_contacto.emailContacto.focus();
            bValidarFormulario = false;
        }
        errorEmailContacto = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email está vacío o con errores.";
        formulario_contacto.emailContacto.classList.add("is-danger");

    } else {
        formulario_contacto.emailContacto.classList.remove("is-danger");
        formulario_contacto.emailContacto.classList.add("is-primary");
    }

    if (mensajeContacto.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_contacto.mensajeContacto.focus();
        }
        errorMensajeContacto = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe añadir un mensaje.";
        formulario_contacto.mensajeContacto.classList.add("is-danger");

    } else {
        formulario_contacto.mensajeContacto.classList.remove("is-danger");
        formulario_contacto.mensajeContacto.classList.add("is-primary");
    }


    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Enviado',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_contacto.submit() }, 1500);
        //formulario_EditarExtra.reset();


    } else {
        swal.fire({
            title: '<h3>¡Revisa antes de enviar!</h3>',
            html: '<p>' + errorNombreContacto + "</p>" +
                '<p>' + errortlfContacto + "</p>" +
                '<p>' + errorFechaContacto + "</p>" +
                '<p>' + errorEmailContacto + "</p>" +
                '<p>' + errorMensajeContacto + "</p>",

            //icon: 'warning',
            imageUrl: '../img/mensajePerdido.png',
            imageWidth: '250px',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }
    console.log("CARGADO");
}
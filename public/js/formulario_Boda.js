'use strict';

//BOTONES

$("#btnGuardarBoda").click(validarNuevaBoda);
// $("#btnPasarAPresupuesto").click(cambiarAFormularioPresupuesto);


$(document).ready(function() {


});

function validarNuevaBoda(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombre = "";
    var errorFecha = "";
    var errorHora = "";
    var errorNombreNovio = "";
    var errorNombreNovia = "";
    var errorTlfNovio = "";
    var errorTlfNovia = "";
    var errorEmailNovio = "";
    var errorEmailNovia = "";
    var errorDescripcion = "";

    let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegTelefono = /^[0-9]{9}$/;

    let nomBoda = formulario_nuevaBoda.nomBoda.value.trim();
    let fechaBoda = formulario_nuevaBoda.fechaBoda.value.trim();
    let horaBoda = formulario_nuevaBoda.horaBoda.value.trim();
    let nomNovio = formulario_nuevaBoda.nomNovio.value.trim();
    let nomNovia = formulario_nuevaBoda.nomNovia.value.trim();
    let tlfNovio = parseInt(formulario_nuevaBoda.tlfNovio.value.trim());
    let tlfNovia = parseInt(formulario_nuevaBoda.tlfNovia.value.trim());
    let emailNovio = formulario_nuevaBoda.emailNovio.value.trim();
    let emailNovia = formulario_nuevaBoda.emailNovia.value.trim();

    if (nomBoda.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevaBoda.nomBoda.focus();
        }
        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe poner un nombre para la Boda.";
        formulario_nuevaBoda.nomBoda.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.nomBoda.classList.remove("is-danger");
        formulario_nuevaBoda.nomBoda.classList.add("is-primary");
    }

    if (fechaBoda == "") {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevaBoda.fechaBoda.focus();
        }
        errorFecha = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una fecha.";
        formulario_nuevaBoda.fechaBoda.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.fechaBoda.classList.remove("is-danger");
        formulario_nuevaBoda.fechaBoda.classList.add("is-primary");
    }

    if (horaBoda == "") {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevaBoda.horaBoda.focus();
        }
        errorHora = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una hora.";
        formulario_nuevaBoda.horaBoda.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.horaBoda.classList.remove("is-danger");
        formulario_nuevaBoda.horaBoda.classList.add("is-primary");
    }

    if (nomNovio.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevaBoda.nomNovio.focus();
        }
        errorNombreNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre del novio está vacío.";
        formulario_nuevaBoda.nomNovio.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.nomNovio.classList.remove("is-danger");
        formulario_nuevaBoda.nomNovio.classList.add("is-primary");
    }

    if (nomNovia.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevaBoda.nomNovia.focus();
        }
        errorNombreNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre de la novia está vacío.";
        formulario_nuevaBoda.nomNovia.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.nomNovia.classList.remove("is-danger");
        formulario_nuevaBoda.nomNovia.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfNovio)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevaBoda.tlfNovio.focus();
        }
        errorTlfNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido para el novio.";
        formulario_nuevaBoda.tlfNovio.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.tlfNovio.classList.remove("is-danger");
        formulario_nuevaBoda.tlfNovio.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfNovia)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevaBoda.tlfNovia.focus();
        }
        errorTlfNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido para la novia.";
        formulario_nuevaBoda.tlfNovia.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.tlfNovia.classList.remove("is-danger");
        formulario_nuevaBoda.tlfNovia.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailNovio)) {
        if (bValidarFormulario) {
            formulario_nuevaBoda.emailNovio.focus();
            bValidarFormulario = false;
        }
        errorEmailNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email del novio está vacío o con errores.";
        formulario_nuevaBoda.emailNovio.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.emailNovio.classList.remove("is-danger");
        formulario_nuevaBoda.emailNovio.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailNovia)) {
        if (bValidarFormulario) {
            formulario_nuevaBoda.emailNovia.focus();
            bValidarFormulario = false;
        }
        errorEmailNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email de la novia está vacío o con errores.";
        formulario_nuevaBoda.emailNovia.classList.add("is-danger");

    } else {
        formulario_nuevaBoda.emailNovia.classList.remove("is-danger");
        formulario_nuevaBoda.emailNovia.classList.add("is-primary");
    }


    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Boda Guardada con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_nuevaBoda.submit() }, 1500);
        //formulario_EditarExtra.reset();


    } else {
        swal.fire({
            title: '<h3>¡No nos rompas el corazón!</h3>',
            html: '<p>' + errorNombre + "</p>" +
                '<p>' + errorFecha + "</p>" +
                '<p>' + errorHora + "</p>" +
                '<p>' + errorNombreNovio + "</p>" +
                '<p>' + errorNombreNovia + "</p>" +
                '<p>' + errorTlfNovio + "</p>" +
                '<p>' + errorTlfNovia + "</p>" +
                '<p>' + errorEmailNovio + "</p>" +
                '<p>' + errorEmailNovia + "</p>",
            //icon: 'warning',
            imageUrl: 'img/corazon_roto.png',
            imageWidth: '150px',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }
    console.log("JS NUEVA BODA CARGADO CON EXITO");
}
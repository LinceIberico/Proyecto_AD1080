'use strict';

//BOTONES

$("#btnNuevaBoda").click(validarNuevaBoda);
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

    let nomBoda = formulario_NuevaBoda.nomBoda.value.trim();
    let fechaBoda = formulario_NuevaBoda.fechaBoda.value.trim();
    let horaBoda = formulario_NuevaBoda.horaBoda.value.trim();
    let nomNovio = formulario_NuevaBoda.nomNovio.value.trim();
    let nomNovia = formulario_NuevaBoda.nomNovia.value.trim();
    let tlfNovio = parseInt(formulario_NuevaBoda.tlfNovio.value.trim());
    let tlfNovia = parseInt(formulario_NuevaBoda.tlfNovia.value.trim());
    let emailNovio = formulario_NuevaBoda.emailNovio.value.trim();
    let emailNovia = formulario_NuevaBoda.emailNovia.value.trim();

    if (nomBoda.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevaBoda.nomBoda.focus();
        }
        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe poner un nombre para la Boda.";
        formulario_NuevaBoda.nomBoda.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.nomBoda.classList.remove("is-danger");
        formulario_NuevaBoda.nomBoda.classList.add("is-primary");
    }

    if (fechaBoda == "") {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevaBoda.fechaBoda.focus();
        }
        errorFecha = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una fecha.";
        formulario_NuevaBoda.fechaBoda.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.fechaBoda.classList.remove("is-danger");
        formulario_NuevaBoda.fechaBoda.classList.add("is-primary");
    }

    if (horaBoda == "") {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevaBoda.horaBoda.focus();
        }
        errorHora = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una hora.";
        formulario_NuevaBoda.horaBoda.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.horaBoda.classList.remove("is-danger");
        formulario_NuevaBoda.horaBoda.classList.add("is-primary");
    }

    if (nomNovio.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevaBoda.nomNovio.focus();
        }
        errorNombreNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre del novio está vacío.";
        formulario_NuevaBoda.nomNovio.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.nomNovio.classList.remove("is-danger");
        formulario_NuevaBoda.nomNovio.classList.add("is-primary");
    }

    if (nomNovia.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevaBoda.nomNovia.focus();
        }
        errorNombreNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre de la novia está vacío.";
        formulario_NuevaBoda.nomNovia.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.nomNovia.classList.remove("is-danger");
        formulario_NuevaBoda.nomNovia.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfNovio)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevaBoda.tlfNovio.focus();
        }
        errorTlfNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido para el novio.";
        formulario_NuevaBoda.tlfNovio.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.tlfNovio.classList.remove("is-danger");
        formulario_NuevaBoda.tlfNovio.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfNovia)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_NuevaBoda.tlfNovia.focus();
        }
        errorTlfNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido para la novia.";
        formulario_NuevaBoda.tlfNovia.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.tlfNovia.classList.remove("is-danger");
        formulario_NuevaBoda.tlfNovia.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailNovio)) {
        if (bValidarFormulario) {
            formulario_NuevaBoda.emailNovio.focus();
            bValidarFormulario = false;
        }
        errorEmailNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email del novio está vacío o con errores.";
        formulario_NuevaBoda.emailNovio.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.emailNovio.classList.remove("is-danger");
        formulario_NuevaBoda.emailNovio.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailNovia)) {
        if (bValidarFormulario) {
            formulario_NuevaBoda.emailNovia.focus();
            bValidarFormulario = false;
        }
        errorEmailNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email de la novia está vacío o con errores.";
        formulario_NuevaBoda.emailNovia.classList.add("is-danger");

    } else {
        formulario_NuevaBoda.emailNovia.classList.remove("is-danger");
        formulario_NuevaBoda.emailNovia.classList.add("is-primary");
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
        setTimeout(function() { formulario_NuevaBoda.submit() }, 1500);
        //formulario_EditarExtra.reset();


    } else {
        swal.fire({
            html: '<p>' + errorNombre + "</p>" +
                '<p>' + errorFecha + "</p>" +
                '<p>' + errorHora + "</p>" +
                '<p>' + errorNombreNovio + "</p>" +
                '<p>' + errorNombreNovia + "</p>" +
                '<p>' + errorTlfNovio + "</p>" +
                '<p>' + errorTlfNovia + "</p>" +
                '<p>' + errorEmailNovio + "</p>" +
                '<p>' + errorEmailNovia + "</p>",
            //text: errores,
            icon: 'warning',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }
    console.log("JS NUEVA BODA CARGADO CON EXITO");
}
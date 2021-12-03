'use strict';

//BOTONES

$("#btnEditarBoda").click(validarEditarBoda);
// $("#btnPasarAPresupuesto").click(cambiarAFormularioPresupuesto);


$(document).ready(function() {


});

function validarEditarBoda(evento) {
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

    let nomBoda = formulario_EditarBoda.nomBoda.value.trim();
    let fechaBoda = formulario_EditarBoda.fechaBoda.value.trim();
    let horaBoda = formulario_EditarBoda.horaBoda.value.trim();
    let nomNovio = formulario_EditarBoda.nomNovio.value.trim();
    let nomNovia = formulario_EditarBoda.nomNovia.value.trim();
    let tlfNovio = parseInt(formulario_EditarBoda.tlfNovio.value.trim());
    let tlfNovia = parseInt(formulario_EditarBoda.tlfNovia.value.trim());
    let emailNovio = formulario_EditarBoda.emailNovio.value.trim();
    let emailNovia = formulario_EditarBoda.emailNovia.value.trim();

    if (nomBoda.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarBoda.nomBoda.focus();
        }
        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe poner un nombre para la Boda.";
        formulario_EditarBoda.nomBoda.classList.add("is-danger");

    } else {
        formulario_EditarBoda.nomBoda.classList.remove("is-danger");
        formulario_EditarBoda.nomBoda.classList.add("is-primary");
    }

    if (fechaBoda == "") {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarBoda.fechaBoda.focus();
        }
        errorFecha = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una fecha.";
        formulario_EditarBoda.fechaBoda.classList.add("is-danger");

    } else {
        formulario_EditarBoda.fechaBoda.classList.remove("is-danger");
        formulario_EditarBoda.fechaBoda.classList.add("is-primary");
    }

    if (horaBoda == "") {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarBoda.horaBoda.focus();
        }
        errorHora = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una hora.";
        formulario_EditarBoda.horaBoda.classList.add("is-danger");

    } else {
        formulario_EditarBoda.horaBoda.classList.remove("is-danger");
        formulario_EditarBoda.horaBoda.classList.add("is-primary");
    }

    if (nomNovio.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarBoda.nomNovio.focus();
        }
        errorNombreNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre del novio está vacío.";
        formulario_EditarBoda.nomNovio.classList.add("is-danger");

    } else {
        formulario_EditarBoda.nomNovio.classList.remove("is-danger");
        formulario_EditarBoda.nomNovio.classList.add("is-primary");
    }

    if (nomNovia.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarBoda.nomNovia.focus();
        }
        errorNombreNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre de la novia está vacío.";
        formulario_EditarBoda.nomNovia.classList.add("is-danger");

    } else {
        formulario_EditarBoda.nomNovia.classList.remove("is-danger");
        formulario_EditarBoda.nomNovia.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfNovio)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarBoda.tlfNovio.focus();
        }
        errorTlfNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido para el novio.";
        formulario_EditarBoda.tlfNovio.classList.add("is-danger");

    } else {
        formulario_EditarBoda.tlfNovio.classList.remove("is-danger");
        formulario_EditarBoda.tlfNovio.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfNovia)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarBoda.tlfNovia.focus();
        }
        errorTlfNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido para la novia.";
        formulario_EditarBoda.tlfNovia.classList.add("is-danger");

    } else {
        formulario_EditarBoda.tlfNovia.classList.remove("is-danger");
        formulario_EditarBoda.tlfNovia.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailNovio)) {
        if (bValidarFormulario) {
            formulario_EditarBoda.emailNovio.focus();
            bValidarFormulario = false;
        }
        errorEmailNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email del novio está vacío o con errores.";
        formulario_EditarBoda.emailNovio.classList.add("is-danger");

    } else {
        formulario_EditarBoda.emailNovio.classList.remove("is-danger");
        formulario_EditarBoda.emailNovio.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailNovia)) {
        if (bValidarFormulario) {
            formulario_EditarBoda.emailNovia.focus();
            bValidarFormulario = false;
        }
        errorEmailNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email de la novia está vacío o con errores.";
        formulario_EditarBoda.emailNovia.classList.add("is-danger");

    } else {
        formulario_EditarBoda.emailNovia.classList.remove("is-danger");
        formulario_EditarBoda.emailNovia.classList.add("is-primary");
    }


    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Boda Actualizada con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_EditarBoda.submit() }, 1500);
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
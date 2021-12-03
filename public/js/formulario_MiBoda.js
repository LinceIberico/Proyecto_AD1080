'use strict';

//BOTONES
$("#btnActualizarBoda").click(validarActualizarBoda);

$(document).ready(function() {

    comprobarSiExisteDiv();
});

function comprobarSiExisteDiv() {

    let existeDiv = document.getElementById('datosBoda');

    if (existeDiv != null) {
        alertInformacion();
    }
}

function alertInformacion() {

    swal.fire({
        autoWith: '150px',
        title: '<h3>¡Nota informativa!</h3>',
        html: '<p class="text-base pb-2">' + "Todo ha salido bien, en breve se pondrán en contacto con usted" + "</p>" +

            '<p class="text-base">' + "Hemos desactivado los botones para crear bodas, ahora puedes editarla aquí" + "</p>",
        icon: 'info',
        // imageUrl: 'img/corazon_roto.png',
        // imageWidth: '150px',
        buttons: {
            confirm: { text: 'OK' },
        },
    });
}

function validarActualizarBoda(evento) {
    console.log("validarCargado");
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

    // let nomBoda = formulario_actualizarBoda.nomBoda.value.trim();
    // let fechaBoda = formulario_actualizarBoda.fechaBoda.value.trim();
    // let horaBoda = formulario_actualizarBoda.horaBoda.value.trim();
    let nomNovio = formulario_actualizarBoda.nomNovio.value.trim();
    let nomNovia = formulario_actualizarBoda.nomNovia.value.trim();
    let tlfNovio = parseInt(formulario_actualizarBoda.tlfNovio.value.trim());
    let tlfNovia = parseInt(formulario_actualizarBoda.tlfNovia.value.trim());
    let emailNovio = formulario_actualizarBoda.emailNovio.value.trim();
    let emailNovia = formulario_actualizarBoda.emailNovia.value.trim();

    // if (nomBoda.length == 0) {
    //     if (bValidarFormulario) {
    //         bValidarFormulario = false;
    //         formulario_actualizarBoda.nomBoda.focus();
    //     }
    //     errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe poner un nombre para la Boda.";
    //     formulario_actualizarBoda.nomBoda.classList.add("is-danger");

    // } else {
    //     formulario_actualizarBoda.nomBoda.classList.remove("is-danger");
    //     formulario_actualizarBoda.nomBoda.classList.add("is-primary");
    // }

    // if (fechaBoda == "") {
    //     if (bValidarFormulario) {
    //         bValidarFormulario = false;
    //         formulario_actualizarBoda.fechaBoda.focus();
    //     }
    //     errorFecha = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una fecha.";
    //     formulario_actualizarBoda.fechaBoda.classList.add("is-danger");

    // } else {
    //     formulario_actualizarBoda.fechaBoda.classList.remove("is-danger");
    //     formulario_actualizarBoda.fechaBoda.classList.add("is-primary");
    // }

    // if (horaBoda == "") {
    //     if (bValidarFormulario) {
    //         bValidarFormulario = false;
    //         formulario_actualizarBoda.horaBoda.focus();
    //     }
    //     errorHora = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar una hora.";
    //     formulario_actualizarBoda.horaBoda.classList.add("is-danger");

    // } else {
    //     formulario_actualizarBoda.horaBoda.classList.remove("is-danger");
    //     formulario_actualizarBoda.horaBoda.classList.add("is-primary");
    // }

    if (nomNovio.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_actualizarBoda.nomNovio.focus();
        }
        errorNombreNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre del novio está vacío.";
        formulario_actualizarBoda.nomNovio.classList.add("is-danger");

    } else {
        formulario_actualizarBoda.nomNovio.classList.remove("is-danger");
        formulario_actualizarBoda.nomNovio.classList.add("is-primary");
    }

    if (nomNovia.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_actualizarBoda.nomNovia.focus();
        }
        errorNombreNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El campo nombre de la novia está vacío.";
        formulario_actualizarBoda.nomNovia.classList.add("is-danger");

    } else {
        formulario_actualizarBoda.nomNovia.classList.remove("is-danger");
        formulario_actualizarBoda.nomNovia.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfNovio)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_actualizarBoda.tlfNovio.focus();
        }
        errorTlfNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido para el novio.";
        formulario_actualizarBoda.tlfNovio.classList.add("is-danger");

    } else {
        formulario_actualizarBoda.tlfNovio.classList.remove("is-danger");
        formulario_actualizarBoda.tlfNovio.classList.add("is-primary");
    }

    if (!oExpRegTelefono.test(tlfNovia)) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_actualizarBoda.tlfNovia.focus();
        }
        errorTlfNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe indicar un teléfono válido para la novia.";
        formulario_actualizarBoda.tlfNovia.classList.add("is-danger");

    } else {
        formulario_actualizarBoda.tlfNovia.classList.remove("is-danger");
        formulario_actualizarBoda.tlfNovia.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailNovio)) {
        if (bValidarFormulario) {
            formulario_actualizarBoda.emailNovio.focus();
            bValidarFormulario = false;
        }
        errorEmailNovio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email del novio está vacío o con errores.";
        formulario_actualizarBoda.emailNovio.classList.add("is-danger");

    } else {
        formulario_actualizarBoda.emailNovio.classList.remove("is-danger");
        formulario_actualizarBoda.emailNovio.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(emailNovia)) {
        if (bValidarFormulario) {
            formulario_actualizarBoda.emailNovia.focus();
            bValidarFormulario = false;
        }
        errorEmailNovia = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email de la novia está vacío o con errores.";
        formulario_actualizarBoda.emailNovia.classList.add("is-danger");

    } else {
        formulario_actualizarBoda.emailNovia.classList.remove("is-danger");
        formulario_actualizarBoda.emailNovia.classList.add("is-primary");
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
        setTimeout(function() { formulario_actualizarBoda.submit() }, 1500);
        //formulario_EditarExtra.reset();


    } else {
        swal.fire({
            title: '<h3>¡No nos rompas el corazón!</h3>',
            html: '<p>' + errorNombreNovio + "</p>" +
                '<p>' + errorNombreNovia + "</p>" +
                '<p>' + errorTlfNovio + "</p>" +
                '<p>' + errorTlfNovia + "</p>" +
                '<p>' + errorEmailNovio + "</p>" +
                '<p>' + errorEmailNovia + "</p>",
            //icon: 'warning',
            imageUrl: '../img/corazon_roto.png',
            imageWidth: '150px',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }
    console.log("CARGADO");
}
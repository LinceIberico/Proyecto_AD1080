'use strict';

console.log("JS NUEVO USUARIO CARGADO CON EXITO");


var bSeVeFormularioBoda = true;

//BOTONES

$("#btnGuardarNuevoUsurario").click(validarNuevoUsuario);
// $("#btnPasarAPresupuesto").click(cambiarAFormularioPresupuesto);


$(document).ready(function() {


});

function validarNuevoUsuario(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    //let errores = [];
    //let errores = "";
    var errorNombre = "";
    var errorContraseña = "";
    var errorEmail = "";

    let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegPassword = /^[0-9]{8}$/;

    let name = formulario_nuevoUsuario.name.value.trim();
    let password1 = formulario_nuevoUsuario.password1.value.trim();
    let password = formulario_nuevoUsuario.password.value.trim();
    let email = formulario_nuevoUsuario.email.value.trim();


    if (name.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevoUsuario.name.focus();
        }
        //errores.splice(0, 0, 'Falta el nombre');
        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Falta el nombre.";
        formulario_nuevoUsuario.name.classList.add("is-danger");

    } else {
        //errores.splice(0, errores.length);
        formulario_nuevoUsuario.name.classList.remove("is-danger");
        formulario_nuevoUsuario.name.classList.add("is-primary");
    }

    if (password1 != password || password == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_nuevoUsuario.password.focus();
        }
        //errores.splice(1, 0, "La contraseña no coincide");
        errorContraseña = "<span style='color: red' <i class='fas fa-exclamation'></i></span> La contraseña no coincide.";
        formulario_nuevoUsuario.password1.classList.add("is-danger");
        formulario_nuevoUsuario.password.classList.add("is-danger");
    } else {
        //errores.splice(0, errores.length);
        formulario_nuevoUsuario.password1.classList.remove("is-danger");
        formulario_nuevoUsuario.password1.classList.add("is-primary");
        formulario_nuevoUsuario.password.classList.remove("is-danger");
        formulario_nuevoUsuario.password.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(email)) {
        if (bValidarFormulario) {
            formulario_nuevoUsuario.email.focus();
            bValidarFormulario = false;
        }
        //errores.splice(2, 0, "El email no cumple los requisitos");
        //errores.push("El email no cumple los requisitos");
        errorEmail = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email no cumple los requisitos";
        formulario_nuevoUsuario.email.classList.add("is-danger");

    } else {
        //errores.splice(0, errores.length);
        formulario_nuevoUsuario.email.classList.remove("is-danger");
        formulario_nuevoUsuario.email.classList.add("is-primary");
    }

    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        //formulario_nuevoUsuario.submit();
        //errores.splice(0, errores.length);
        //errores.push('<i class="fas fa-check fa-7x"></i>');

        // swal('', "Usuario Creado", 'success');
        // setTimeout(function() { formulario_nuevoUsuario.submit() }, 4000);
        swal.fire({
            text: 'Usuario Creado con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_nuevoUsuario.submit() }, 1500);
        //formulario_nuevoUsuario.reset();


    } else {
        swal.fire({
            html: '<p>' + errorNombre + "</p>" +
                '<p>' + errorContraseña + "</p>" +
                '<p>' + errorEmail + "</p>",
            //text: errores,
            icon: 'warning',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }

    // function cargarModal(errores) {
    //     console.log(errores);

    //     let modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog">';
    //     modal += '<div class="modal-dialog modal-dialog-centered">';
    //     modal += '<div class="modal-content">';
    //     modal += '<div class="modal-header bg-info">';
    //     modal += '<h2 class="modal-title mx-auto text-light" style="font-size: 3vh;" id="myModal-label">Comprobación de Datos</h2>';
    //     modal += '</div>';
    //     modal += '<div class="modal-body mx-auto">';
    //     for (let i = 0; errores.length > i; i++) {
    //         modal += '<h4 style="font-size: 2.2vh;"><span style="color: red" <i class="fas fa-exclamation"></i></span>' + " " + errores[i] + '</h4>';
    //     }
    //     modal += '</div>';
    //     modal += '<div class="modal-footer">';
    //     modal += '<button type="button" class="btn btn-info" data-dismiss="modal">OK</button>';
    //     modal += '</div>';
    //     modal += '</div>';
    //     modal += '</div>';
    //     modal += '</div>';

    //     $("#modal-errores").html(modal);
    // }
}
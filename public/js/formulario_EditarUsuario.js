'use strict';


var bSeVeFormularioBoda = true;

//BOTONES

$("#btnEditarUsuario").click(validarEditarUsuario);
// $("#btnPasarAPresupuesto").click(cambiarAFormularioPresupuesto);


$(document).ready(function() {


});

function validarEditarUsuario(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombre = "";
    var errorEmail = "";

    let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegPassword = /^[0-9]{8}$/;

    let name = formulario_EditarUsuario.name.value.trim();
    let email = formulario_EditarUsuario.email.value.trim();


    if (name.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarUsuario.name.focus();
        }

        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Falta el nombre.";
        formulario_EditarUsuario.name.classList.add("is-danger");

    } else {

        formulario_EditarUsuario.name.classList.remove("is-danger");
        formulario_EditarUsuario.name.classList.add("is-primary");
    }

    if (!oExpRegEmail.test(email)) {
        if (bValidarFormulario) {
            formulario_EditarUsuario.email.focus();
            bValidarFormulario = false;
        }
        errorEmail = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El email no cumple los requisitos";
        formulario_EditarUsuario.email.classList.add("is-danger");

    } else {
        formulario_EditarUsuario.email.classList.remove("is-danger");
        formulario_EditarUsuario.email.classList.add("is-primary");
    }

    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Usuario Actualizado con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_EditarUsuario.submit() }, 1500);
        //formulario_EditarUsuario.reset();


    } else {
        swal.fire({
            html: '<p>' + errorNombre + "</p>" +
                '<p>' + errorEmail + "</p>",
            //text: errores,
            icon: 'warning',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }

}
console.log("JS EDITAR USUARIO CARGADO CON EXITO");
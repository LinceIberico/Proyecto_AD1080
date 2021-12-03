'use strict';

//BOTONES

$("#btnEditarPack").click(validarEditarPack);


$(document).ready(function() {


});

function validarEditarPack(evento) {
    evento.preventDefault();

    let bValidarFormulario = true;

    var errorNombre = "";
    var errorPrecio = "";
    var errorDescripcion = "";

    //let oExpRegEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let oExpRegPassword = /^[0-9]{8}$/;

    let nomPack = formulario_EditarPack.nomPack.value.trim();
    let precioPack = formulario_EditarPack.precioPack.value.trim();
    let descripcion = formulario_EditarPack.descripcion.value.trim();


    if (nomPack.length == 0) {
        if (bValidarFormulario) {
            bValidarFormulario = false;
            formulario_EditarPack.nomPack.focus();
        }

        errorNombre = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Falta el nombre.";
        formulario_EditarPack.nomPack.classList.add("is-danger");

    } else {

        formulario_EditarPack.nomPack.classList.remove("is-danger");
        formulario_EditarPack.nomPack.classList.add("is-primary");
    }

    if (precioPack == null || precioPack.length == 0) {
        if (bValidarFormulario) {
            formulario_EditarPack.precioPack.focus();
            bValidarFormulario = false;
        }
        errorPrecio = "<span style='color: red' <i class='fas fa-exclamation'></i></span> El precio tiene que ser numérico.";
        formulario_EditarPack.precioPack.classList.add("is-danger");

    } else {
        formulario_EditarPack.precioPack.classList.remove("is-danger");
        formulario_EditarPack.precioPack.classList.add("is-primary");
    }

    if (descripcion.length == 0) {
        if (bValidarFormulario) {
            formulario_EditarPack.descripcion.focus();
            bValidarFormulario = false;
        }
        errorDescripcion = "<span style='color: red' <i class='fas fa-exclamation'></i></span> Debe haber alguna descripción.";
        formulario_EditarPack.descripcion.classList.add("is-danger");

    } else {
        formulario_EditarPack.descripcion.classList.remove("is-danger");
        formulario_EditarPack.descripcion.classList.add("is-primary");
    }

    // COMPROBACIÓN FINAL
    if (bValidarFormulario) { // Si todo OK

        swal.fire({
            text: 'Pack Actualizado con Éxito',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_EditarPack.submit() }, 1500);
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
console.log("JS EDITAR PACK CARGADO CON EXITO");
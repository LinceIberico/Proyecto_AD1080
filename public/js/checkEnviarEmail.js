'use strict';

//BOTONES
$("#btnEnviarPDFEmpleado").click(checkEnviarEmail);

$(document).ready(function() {

});


function checkEnviarEmail(evento) {

    evento.preventDefault();

    let bValidarFormulario = true;

    var errorCheck = "";

    //let comprobarChech = document.getElementsByTagName('emailUsuarios');


    // let comprobarChech = comprobarChech.checked;
    if ($('#emailUsuarios').prop('checked')) {
        swal.fire({
            text: 'Emial Enviado',
            icon: 'success',
            //confirmButtonText: "Aceptar",
            //timer: 5000,
            buttons: {
                confirm: { text: 'OK' },
            },
        });
        setTimeout(function() { formulario_Empleado.submit() }, 300);
        //formulario_EditarExtra.reset();
    } else {
        swal.fire({
            title: '<h3>¡No seleccionó ningún empleado!</h3>',
            html: '<p>' + errorCheck + '</p>',

            //icon: 'warning',
            imageUrl: '../img/mensajePerdido.png',
            imageWidth: '250px',
            buttons: {
                confirm: { text: 'OK' },
            },
        });
    }
}
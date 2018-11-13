/*
//Funciones para acceso-----------------------------------
$(document).on('click', '#BtnIngresar', function () {
    $('#contenido').fadeIn();
    $("#navegacion").fadeOut("script/bienvenida.php");
});



$(document).on('click', '#BTNacceso', function () {
    $('.jumbotron').fadeOut();
    $('#contenido').fadeIn();
    var datos = $('#FRMlogin').serialize();
    $.post("script/acceso.php", datos, function (res) {
        if (res == "OK") {
            $("#navegacion").fadeIn("script/bienvenida.php");
            $("#navegacion").load("script/bienvenida.php");
            $('#contenido').load("script/menu.php");
        }
        else {
            alert('Acceso no permitido');
            $('#contenido').load("script/FRMlogin.php");
        }
    });
});

$(document).on('click', '#BtnPerfil', function () {
    $("#contenido").load('script/FrmModificarUsuario.php')
});

$(document).on('click', '#BTNsalir', function () {
    $('.jumbotron').fadeIn();
    $('#contenido').load("script/salir.php", function () {
        $("#navegacion").load("script/bienvenida.php");
        alert('Hasta luego!!');
    });
});

$(document).on('click', '#BtnRegistro', function () {
    //$('#contenido').fadeIn();
    //$("#contenido").load("/usuario/script/FrmRegistrarUsuario.php");
    $("#contenido").load('script/FrmRegistrarUsuario.php');
});

$(document).on('click', '#BtnRegistrar_us', function () {
    //Empaquetar los datos del formulario
    var datos = $("#FrmRegistrarUsuario").serialize();
    $.post("script/GuardarUsuario.php", datos, function (res) {
        $("#contenido").empty();
        $("#contenido").append(res);        
    });
});

$(document).on('click', '#BtnCancelar', function () {
    //$("#navegacion").load("script/bienvenida.php");
    $('#contenido').load("script/FRMlogin.php");
    //window.close();
});

function openNewTab(url) {
    var win = window.open(url, '_blank');
    if (win) {
        //Browser has allowed it to be opened
        win.focus();
    } else {
        //Browser has blocked it
        alert('Please allow popups for this website');
    }
}
*/
var mesa=null;

$(document).ready(function () {

    var contadorMesas=1;
    $(function () {
        $('.convidado').draggable({
            helper: "clone",
            zIndex: 1000,
            scroll: false,
            stop: function(e) {
                convidado = $(this);
                convidado.removeClass('ui-draggable ui-draggable-handle').addClass('btn btn-danger').attr('disabled','disabled');
                alert(mesa +" convidado : " + convidado.attr('id'));
            }
        });


    });

    $("#addTable").click(function () {
        contadorMesas++;
        $("#sala").append("<div ondblclick='arranque(this)' data-count='0' class='mesa text-md-center align-middle' id='mesa"+contadorMesas+"'>" +
            "<h6>Titulo da mesa</h6>" +
            "<i class='fa fa-users fa-3x' aria-hidden='true'></i>" +
            "<button type='button' class='btn btn-danger btn-sm'>Convidados <span class='tag-pill tag-warning'>0/6</span></button></div>");
        $( ".mesa" ).draggable({
            containment: "#sala",
            scroll: false,
            stop: function() {
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                console.log('id: '+$(this).attr('id')+ ' x: ' + xPos + ' y: ' + yPos);
            }
        });
        $('.mesa').droppable({
            drop: function () {
                mesa = $(this).attr('id');
            }
        });

    });

    $("#addCircle").click(function () {
        contadorMesas++;
        $("#sala").append("<div ondblclick='arranque(this)' class='circle' id='mesa"+contadorMesas+"'><i class='fa fa-users fa-3x fa-align-center' aria-hidden='true'></i><br><span class='label label-warning'>0/6</span></div>");
        $( ".circle" ).draggable({
            containment: "#sala",

            scroll: false,
            stop: function() {
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                console.log('id: '+$(this).attr('id')+ ' x: ' + xPos + ' y: ' + yPos);

            }
        });

    });


    $(".fechar").click(function () {
        $(".mesa").each(function () {
            $(this).removeClass("seleccionado");
        });
        $(".circle").each(function () {
            $(this).removeClass("seleccionado");
        });
    });
} );

function arranque(table) {

    mesa = "#"+table.id;

    $(mesa).addClass("seleccionado");

    $('#myModal').modal('toggle');

}



function alterarMesa(valor, mesaz) {

    var x = mesaz;

    if ($(x).hasClass('circle')){
        $(x).removeClass("circle100").removeClass("circle120").removeClass("circle140").removeClass("circle160");
        if (valor == 6) {
            $(mesaz).text("6 Lugares");
            $(x).addClass("circle100");
        } else if (valor == 8) {
            $(mesaz).text("8 Lugares");
            $(x).addClass("circle120");
        } else if (valor == 10) {
            $(mesaz).text("10 Lugares");
            $(x).addClass("circle140");
        } else if (valor == 12) {
            $(mesaz).text("12 Lugares");
            $(x).addClass("circle160");
        }
    }else{
        if (valor == 6) {
            $(mesaz).children('span').text('10/10').css("width", "150px");
        } else if (valor == 8) {
            $(mesaz).children('span').text('10/10').css("width", "170px");
        } else if (valor == 10) {
            $(mesaz).children('span').text('10/10').css("width", "190px");
        } else if (valor == 12) {
            $(mesaz).children('span').text('10/10').css("width", "210px");
        }
    }
}




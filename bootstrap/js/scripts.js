var mesa=null;

$(document).ready(function () {

    var contadorMesas=0;
    $(function () {
        $('.convidado').draggable({
            helper: "clone",
            zIndex: 1000,
            scroll: false,
            stop: function(e) {
                convidado = $(this);
                convidado.removeClass('ui-draggable ui-draggable-handle').addClass('btn btn-danger').attr('disabled','disabled');
                alert(mesa +" convidado : " + convidado.attr('id'));
                convidado.draggable('disable');
                convidado.append(" <span class='tag-pill tag-warning pull-right'>Mesa n. "+mesa+"</span>");
            }
        });


    });

    $("#addTable").click(function () {
        contadorMesas++;

        $("#sala").append("<div ondblclick='arranque(this)' lugares='6' class='mesa text-md-center align-middle' id='"+contadorMesas+"'>" +
            "<h6>Mesa no. "+contadorMesas+"</h6>" +
            "<i class='fa fa-users fa-3x' aria-hidden='true'></i>" +
            "<button type='button' class='btn btn-danger btn-sm'>Convidados <span class='tag-pill tag-warning'></span></button></div>");
        var lugares = $("#sala").children('div').attr('lugares');

        $.ajax({
            url: 'trata.php',
            type: 'post',
            data: {id: contadorMesas, nome: mesa, lugares: lugares, accao: 'inserirMesa'},
            success: function (result) {
                if (result){
                    $("#sala").find('span').text('0/'+lugares);
                }
            }
        });


        $( ".mesa" ).draggable({
            containment: "#sala",
            scroll: false,
            stop: function() {
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                var id = $(this).attr('id');
                $.ajax({
                    url: 'trata.php',
                    type: 'post',
                    data: {id: id, x: xPos, y: yPos, accao: 'editarPosicaoMesa'},
                    success: function (result) {
                        console.log('id: '+ id + ' x: ' + xPos + ' y: ' + yPos);
                    }
                });
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

    mesa = table.id;

    $("#"+mesa).addClass("seleccionado");

    $('#myModal').modal('toggle');

}



function alterarMesa(valor) {

    $.ajax({
        url: 'trata.php',
        type: 'post',
        data: {id: mesa, lugares: valor, accao: 'editarMesa'},
        success: function (result) {
            alert(result);
            $("#sala div#"+mesa).attr('lugares',valor).find('span').text('0/'+valor);
        }
    });

}




var mesa=null;

$(document).ready(function () {

    var contadorMesas=0;
    $(function () {
        $('.convidado').draggable({
            helper: "clone",
            zIndex: 1000,
            scroll: false,
            stop: function(e) {
                if (mesa != null) {
                    convidado = $(this);
                    console.log(convidado.attr('id')+" - " + convidado.text() + " " + mesa + " " + mesaNome + " " + mesaLugares);

                    $.ajax({
                        url: 'trata.php',
                        type: 'post',
                        data: {id_convidado: convidado.attr('id'), nome_convidado: convidado.text(), id_mesa: mesa, nome_mesa: mesaNome, lugares: mesaLugares, accao: 'colocarConvidado'},
                        success: function (result) {
                            if (result.trim() == 'erro'){
                                console.log ("erro ao inserir convidado");
                            } else if (result.trim() == 'lugares'){
                                console.log ("Esta mesa já não tem lugares disponiveis");
                            } else {
                                convidado.removeClass('ui-draggable ui-draggable-handle').addClass('btn btn-danger').attr('disabled', 'disabled');
                                convidado.draggable('disable');
                                convidado.append(" <span class='tag-pill tag-warning pull-right'>Mesa nº " + mesa + "</span>");
                                $("#sala div#"+mesa).find('span').text(result+'/'+mesaLugares);
                                mesa = null;
                            }

                        }
                    });
                }
            }
        });
    });


    $("#addTable").click(function () {


        $.ajax({
            url: 'trata.php',
            type: 'post',
            data: {nome: mesa, lugares: 6, accao: 'inserirMesa'},
            success: function (result) {
                var result = result.trim();
                    console.log(result);
                    $("#sala").append("<div ondblclick='arranque(this)' lugares='6' class='mesa text-md-center align-middle'>" +
                        "<h6 class='nomeMesa"+result+"' onclick='mostraInput("+result+")'>Mesa nº "+result+"</h6>" +
                        "<i class='fa fa-users fa-3x' aria-hidden='true'></i>" +
                        "<button type='button' class='btn btn-danger btn-sm'>Convidados <span class='tag-pill tag-warning'></span></button></div>")
                        .find('span').text('0/6');
                    $("div.mesa:last").attr('id',result);

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
                        if ($(this).hasClass('mesa')){
                            mesa = $(this).attr('id');
                            mesaNome = $(this).find('h6').text();
                            mesaLugares = $(this).attr('lugares');
                        }else{
                            mesa = null;
                        }
                    }
                });
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

function mostraInput(id) {

        $(".nomeMesa"+id).empty().html("<input style='z-index: 2000;' class='mesaInput"+id+"' onchange='editarNomeMesa("+id+")' size='10'>");
        $("mesaInput"+id).focus();

}


function arranque(table) {

    mesa = table.id;

    $("#"+mesa).css("border","2px");

    $('#myModal').modal('toggle');

}



function alterarMesa(valor) {

    $.ajax({
        url: 'trata.php',
        type: 'post',
        data: {id: mesa, lugares: valor, accao: 'editarMesa'},
        success: function (result) {

            $("#sala div#"+mesa).attr('lugares',valor).find('span').text('0/'+valor);
        }
    });

}




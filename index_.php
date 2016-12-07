<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Draggable - Constrain movement</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        .mesa { width: 90px; height: 90px; padding: 0.5em; float: left; margin: 0 10px 10px 0; cursor: pointer; }

        #containment-wrapper { width: 99%; height:600px; border:2px solid #ccc; padding: 10px; }
        h3 { clear: left; }

        .seleccionado{
            border: solid navy 3px;
        }

        .circle {
            width: 100px;
            height: 100px;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 50px;
        }

        .circle100 {
             width: 100px;
             height: 100px;
             -moz-border-radius: 50px;
             -webkit-border-radius: 50px;
             border-radius: 50px;
        }
        .circle120 {
            width: 120px;
            height: 120px;
            -moz-border-radius: 60px;
            -webkit-border-radius: 60px;
            border-radius: 60px;
        }
        .circle140 {
            width: 140px;
            height: 140px;
            -moz-border-radius: 70px;
            -webkit-border-radius: 70px;
            border-radius: 70px;
        }
        .circle160 {
            width: 160px;
            height: 160px;
            -moz-border-radius: 80px;
            -webkit-border-radius: 80px;
            border-radius: 80px;
        }

    </style>



    <script>
        var mesa=null;

        $(document).ready(function () {

            var contadorMesas=1;

            $( ".mesa" ).draggable({
                containment: "#containment-wrapper",
                scroll: false,
                stop: function() {
                    var offset = $(this).offset();
                    var xPos = offset.left;
                    var yPos = offset.top;
                    console.log('id: '+$(this).attr('id')+ ' x: ' + xPos + ' y: ' + yPos);

                }
            });

            $("#add").click(function () {
                contadorMesas++;
                $("#containment-wrapper").append("<div ondblclick='arranque(this)' class='ui-widget-content mesa' id='mesa"+contadorMesas+"'>6 Lugares</div>");
                $( ".mesa" ).draggable({
                    containment: "#containment-wrapper",
                    scroll: false,
                    stop: function() {
                        var offset = $(this).offset();
                        var xPos = offset.left;
                        var yPos = offset.top;
                        console.log('id: '+$(this).attr('id')+ ' x: ' + xPos + ' y: ' + yPos);

                    }
                });
            });

            $("#addCircle").click(function () {
                contadorMesas++;
                $("#containment-wrapper").append("<div ondblclick='arranque(this)' class='ui-widget-content circle' id='mesa"+contadorMesas+"'>6 Lugares</div>");
                $( ".circle" ).draggable({
                    containment: "#containment-wrapper",
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

        };



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
                    $(mesaz).text("6 Lugares").css("width", "90px");
                } else if (valor == 8) {
                    $(mesaz).text("8 Lugares").css("width", "120px");
                } else if (valor == 10) {
                    $(mesaz).text("10 Lugares").css("width", "150px");
                } else if (valor == 12) {
                    $(mesaz).text("12 Lugares").css("width", "180px");
                }
            }
        }

//        HTMLElement.prototype.hasClass = function(cls) {
//            var i;
//            var classes = this.className.split(" ");
//            for(i = 0; i < classes.length; i++) {
//                if(classes[i] == cls) {
//                    return true;
//                }
//            }
//            return false;
//        };

    </script>
</head>
<body>


<div id="containment-wrapper">
    <div class="ui-widget-content mesa" ondblclick='arranque(this)' id="mesa1">
        6 Lugares
    </div>
</div>
<div class="container">
    <button id="add" class="btn btn-sm btn-primary pull-left">Adicionar mesa rectangular</button>
    <button id="addCircle" class="btn btn-sm btn-primary pull-left">Adicionar mesa redonda</button>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Escolha o nº de lugares da mesa</h4>
            </div>
            <div class="modal-body">
                <select id="lugares" onchange="alterarMesa(this.value, mesa)">
                    <option value="" selected>Nº de lugares</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default fechar" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</body>
</html>

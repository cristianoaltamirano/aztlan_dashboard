<?php
/**
 * Created by PhpStorm.
 * User: calta
 * Date: 6/4/2017
 * Time: 02:01
 */

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-AR">
<head>

    <?php $this->load->view("includes/header"); ?>

    <title>Reportes de Pagos</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
          href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

    <style type="text/css">
        .icon-calendar {
            margin-top: -4px !important;
        }
    </style>
    <script type="text/javascript">
        var hoy = new Date();
        var d = hoy.getDate();
        if (d.toString().length == 1) {
            d = 0 + d.toString();
        }
        var m = hoy.getMonth();
        m += 1;  // JavaScript months are 0-11
        if (m.toString().length == 1) {
            m = 0 + m.toString();
        }

        var y = hoy.getFullYear();
        fechaDefault = y + '-' + m + '-' + d;
        var fechaDesde;
        var fechaHasta;
        var fecha;
        $(function () {
            $('#datetimepicker4').datetimepicker({
                pickTime: false,
                debug: true
            });
            var object;
            $("#datetimepicker4").on('changeDate', function (e) {

                var formattedDate = new Date(e.localDate);
                var d = formattedDate.getDate();
                if (d.toString().length == 1) {
                    d = 0 + d.toString();
                }
                var m = formattedDate.getMonth();
                m += 1;  // JavaScript months are 0-11
                if (m.toString().length == 1) {
                    m = 0 + m.toString();
                }

                var y = formattedDate.getFullYear();
                fecha = y + '-' + m + '-' + d;

                $.ajax({
                    type: "POST",
                    url: 'classes/getPagosDia.php',
                    dataType: 'json',
                    data: {fecha: fecha},

                    success: function (obj, textstatus) {
                        if (!('error' in obj)) {
                            $('#error').hide();
                            $("#pagosTablaDia > tbody").html("");
                            tr = $('#pagosTablaDia');
                            total = 0;
                            for (var i = 0; i < obj.length; i++) {
                                total = total + Number(obj[i].pagos);
                                tr.append('<tr>' + "<td>" + obj[i].fecha + "</td>" + "<td>" + obj[i].sede + "</td>" + "<td>" + obj[i].curso + "</td>" + "<td>" + obj[i].alumno + "</td>" + "<td>" + obj[i].pagos + "</td>" + "<td>" + obj[i].mes + "</td>" + '</tr>');
                            }
                            tr.append('<tr>' + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td>$" + total + "</td>" + '</tr>');
                            if (obj.length < 1) {
                                $('#error').show();
                            }
                        }
                        else {
                            $('#error').show();
                            console.log("error");
                        }
                    }
                });
            });

            $('#mestimepicker4desde').datetimepicker({
                pickTime: false,
                debug: true,
            });

            $("#mestimepicker4desde").on('changeDate', function (e) {

                var formattedDate = new Date(e.localDate);
                var d = formattedDate.getDate();
                if (d.toString().length == 1) {
                    d = 0 + d.toString();
                }
                var m = formattedDate.getMonth();
                m += 1;  // JavaScript months are 0-11
                if (m.toString().length == 1) {
                    m = 0 + m.toString();
                }

                var y = formattedDate.getFullYear();
                fechaDesde = y + '-' + m + '-' + d;

                $.ajax({
                    type: "POST",
                    url: 'classes/getPagosMes.php',
                    dataType: 'json',
                    data: {fechaDesde: fechaDesde, fechaHasta: fechaHasta},

                    success: function (obj, textstatus) {
                        if (!('error' in obj)) {
                            $('#error').hide();
                            $("#pagosTablaMes > tbody").html("");
                            tr = $('#pagosTablaMes');
                            total = 0;
                            for (var i = 0; i < obj.length; i++) {
                                total = total + Number(obj[i].pagos);
                                tr.append('<tr>' + "<td>" + obj[i].fecha + "</td>" + "<td>" + obj[i].sede + "</td>" + "<td>" + obj[i].curso + "</td>" + "<td>" + obj[i].alumno + "</td>" + "<td>" + obj[i].pagos + "</td>" + "<td>" + obj[i].mes + "</td>" + '</tr>');
                            }
                            tr.append('<tr>' + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td>$" + total + "</td>" + '</tr>');
                            if (obj.length < 1) {
                                $('#error').show();
                            }
                        }
                        else {
                            $('#error').show();
                            console.log("error");
                        }
                    }
                });
            });

            $('#mestimepicker4hasta').datetimepicker({
                pickTime: false,
                debug: true,
            });

            $("#mestimepicker4hasta").on('changeDate', function (e) {

                var formattedDate = new Date(e.localDate);
                var d = formattedDate.getDate();
                if (d.toString().length == 1) {
                    d = 0 + d.toString();
                }
                var m = formattedDate.getMonth();
                m += 1;  // JavaScript months are 0-11
                if (m.toString().length == 1) {
                    m = 0 + m.toString();
                }

                var y = formattedDate.getFullYear();
                fechaHasta = y + '-' + m + '-' + d;

                $.ajax({
                    type: "POST",
                    url: 'classes/getPagosMes.php',
                    dataType: 'json',
                    data: {fechaDesde: fechaDesde, fechaHasta: fechaHasta},

                    success: function (obj, textstatus) {
                        if (!('error' in obj)) {
                            $('#error').hide();
                            $("#pagosTablaMes > tbody").html("");
                            tr = $('#pagosTablaMes');
                            total = 0;
                            for (var i = 0; i < obj.length; i++) {
                                total = total + Number(obj[i].pagos);
                                tr.append('<tr>' + "<td>" + obj[i].fecha + "</td>" + "<td>" + obj[i].sede + "</td>" + "<td>" + obj[i].curso + "</td>" + "<td>" + obj[i].alumno + "</td>" + "<td>" + obj[i].pagos + "</td>" + "<td>" + obj[i].mes + "</td>" + '</tr>');
                            }
                            tr.append('<tr>' + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td>$" + total + "</td>" + '</tr>');
                            if (obj.length < 1) {
                                $('#error').show();
                            }
                        }
                        else {
                            $('#error').show();
                            console.log("error");
                        }
                    }
                });
            });

            $("#anualtimepicker4").on('changeDate', function (e) {

                var formattedDate = new Date(e.localDate);
                var d = formattedDate.getDate();
                if (d.toString().length == 1) {
                    d = 0 + d.toString();
                }
                var m = formattedDate.getMonth();
                m += 1;  // JavaScript months are 0-11
                if (m.toString().length == 1) {
                    m = 0 + m.toString();
                }

                var y = formattedDate.getFullYear();
                fecha = y + '-' + m;

                $.ajax({
                    type: "POST",
                    url: 'classes/getPagosAnual.php',
                    dataType: 'json',
                    data: {year: y},

                    success: function (obj, textstatus) {
                        if (!('error' in obj)) {
                            $('#error').hide();
                            $("#pagosTablaAnual > tbody").html("");
                            tr = $('#pagosTablaAnual');
                            total = 0;
                            for (var i = 0; i < obj.length; i++) {
                                total = total + Number(obj[i].pagos);
                                tr.append('<tr>' + "<td>" + obj[i].fecha + "</td>" + "<td>" + obj[i].sede + "</td>" + "<td>" + obj[i].curso + "</td>" + "<td>" + obj[i].alumno + "</td>" + "<td>" + obj[i].pagos + "</td>" + "<td>" + obj[i].mes + "</td>" + '</tr>');
                            }
                            tr.append('<tr>' + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td></td>" + "<td>$" + total + "</td>" + '</tr>');
                            if (obj.length < 1) {
                                $('#error').show();
                            }
                        }
                        else {
                            $('#error').show();
                            console.log("error");
                        }
                    }
                });
            });

            $('#anualtimepicker4').datetimepicker({
                pickTime: false,
                debug: true,
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });

        });
        $(document).ready(function () {
            $("#botonExcelDia").click(function (event) {
                $("#datos_a_enviar_dia").val($("<div>").append($("#pagosTablaDia").eq(0).clone()).html());
                $("#FormularioExportacionDia").submit();
            });

            $("#botonExcelMes").click(function (event) {
                $("#datos_a_enviar_mes").val($("<div>").append($("#pagosTablaMes").eq(0).clone()).html());
                $("#FormularioExportacionMes").submit();
            });

            $("#botonExcelAnual").click(function (event) {
                $("#datos_a_enviar_anual").val($("<div>").append($("#pagosTablaAnual").eq(0).clone()).html());
                $("#FormularioExportacionAnual").submit();
            });


            $(".dia_btn").click(function () {
                $(this).parent().addClass('active');
                $(".mes_btn").parent().removeClass('active');
                $(".anual_btn").parent().removeClass('active');
                $("#container-dia").show(1000);
                $("#container-mes").hide(1000);
                $("#container-anual").hide(1000);
            });
            $(".mes_btn").click(function () {
                $(this).parent().addClass('active');
                $(".dia_btn").parent().removeClass('active');
                $(".anual_btn").parent().removeClass('active');
                $("#container-dia").hide(1000);
                $("#container-mes").show(1000);
                $("#container-anual").hide(1000);
            });
            $(".anual_btn").click(function () {
                $(this).parent().addClass('active');
                $(".dia_btn").parent().removeClass('active');
                $(".mes_btn").parent().removeClass('active');
                $("#container-dia").hide(1000);
                $("#container-mes").hide(1000);
                $("#container-anual").show(1000);
            });
        });

    </script>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed">
<div class="page-wrapper">

    <?php $this->load->view("includes/nav"); ?>
    <div class="page-container">

        <?php $this->load->view("includes/sidebar"); ?>

        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-dark sbold uppercase">Reservas</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <header style="margin-left:10px;margin-right:10px;">
                                        <img src="img/azteca.png" class="img-responsive" alt="Image"
                                             style="width:100px;height:100px;float: left">
                                        <h1 style="height:100px;padding-top:30px;margin-left:124px;">Reportes de
                                            Pagos</h1>
                                        <div class="navbar" style="background-color: #f5f5f5;min-height: 40px;">
                                            <div class="container-fluid">
                                                <ul class="nav navbar-nav">
                                                    <li class="active" style="margin-bottom: 0px;">
                                                        <a href="#" class="dia_btn">Diario</a>
                                                    </li>
                                                    <li style="margin-bottom: 0px;">
                                                        <a href="#" class="mes_btn">Mensual</a>
                                                    </li>
                                                    <li style="margin-bottom: 0px;">
                                                        <a href="#" class="anual_btn">Anual</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </header>
                                    <div id="container-dia" style="margin-left:10px;margin-right:10px;">

                                        <div class="well" style="width:450px;">
                                            <div id="datetimepicker4" class="input-append" style="float:left;">
                                                <input data-format="yyyy-MM-dd" type="text"></input>
                                                <span class="add-on">
		      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
		      </i>
		    </span>
                                            </div>
                                            <form action="classes/exportExcelDia.php" method="post" target="_blank"
                                                  id="FormularioExportacionDia" style="margin-bottom:0px">
                                                <button type="button" id="botonExcelDia" class="btn btn-sm btn-default"
                                                        style="margin-left:30px;margin-top:-6px;">Export Excel
                                                </button>
                                                <input type="hidden" id="datos_a_enviar_dia" name="datos_a_enviar_dia"/>
                                            </form>
                                        </div>
                                        <h1 id='error' style="display:none;">No se encontraron resultados.</h1>
                                        <div style="width:900px;">
                                            <table class="table table-hover" id="pagosTablaDia">
                                                <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Sede</th>
                                                    <th>Curso</th>
                                                    <th>Alumno</th>
                                                    <th>Monto Abonado</th>
                                                    <th>Mes Abonado</th>
                                                    <th>Total Ingresado en el D&iacute;a</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <!-- <tfoot>
                                                  <tr>
                                                      <td colspan="5" style="text-align: left;">
                                                          <input class="btn" type="button" id="addrow" value="Add Row" />
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td colspan="">Grand Total: $<span id="grandtotal"></span>

                                                      </td>
                                                  </tr>
                                              </tfoot> -->
                                            </table>

                                        </div>
                                    </div>
                                    <div id="container-mes" style="margin-left:10px;margin-right:10px;display:none;">

                                        <div class="well" style="width:450px;">
                                            <div>Desde:</div>
                                            <div id="mestimepicker4desde" class="input-append" style="float:left;">
                                                <input data-format="yyyy-MM-dd" type="text"></input>
                                                <span class="add-on">
		      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
		      </i>
		    </span>
                                            </div>
                                            <br/><br/>
                                            <div>Hasta:</div>
                                            <div id="mestimepicker4hasta" class="input-append" style="float:left;">
                                                <input data-format="yyyy-MM-dd" type="text"></input>
                                                <span class="add-on">
		      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
		      </i>
		    </span>
                                            </div>
                                            <form action="classes/exportExcelMes.php" method="post" target="_blank"
                                                  id="FormularioExportacionMes" style="margin-bottom:0px">
                                                <button type="button" id="botonExcelMes" class="btn btn-sm btn-default"
                                                        style="margin-left:30px;margin-top:-6px;">Export Excel
                                                </button>
                                                <input type="hidden" id="datos_a_enviar_mes" name="datos_a_enviar_mes"/>
                                            </form>
                                        </div>
                                        <h1 id='error' style="display:none;">No se encontraron resultados.</h1>
                                        <div style="width:900px;">
                                            <table class="table table-hover" id="pagosTablaMes">
                                                <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Sede</th>
                                                    <th>Curso</th>
                                                    <th>Alumno</th>
                                                    <th>Monto Abonado</th>
                                                    <th>Mes Abonado</th>
                                                    <th>Total Ingresado en el D&iacute;a</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <!-- <tfoot>
                                                  <tr>
                                                      <td colspan="5" style="text-align: left;">
                                                          <input class="btn" type="button" id="addrow" value="Add Row" />
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td colspan="">Grand Total: $<span id="grandtotal"></span>

                                                      </td>
                                                  </tr>
                                              </tfoot> -->
                                            </table>

                                        </div>
                                    </div>
                                    <div id="container-anual" style="margin-left:10px;margin-right:10px;display:none;">

                                        <div class="well" style="width:450px;">
                                            <div id="anualtimepicker4" class="input-append" style="float:left;">
                                                <input data-format="yyyy-MM-dd" type="text"></input>
                                                <span class="add-on">
		      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
		      </i>
		    </span>
                                            </div>
                                            <form action="classes/exportExcelAnual.php" method="post" target="_blank"
                                                  id="FormularioExportacionAnual" style="margin-bottom:0px">
                                                <button type="button" id="botonExcelAnual"
                                                        class="btn btn-sm btn-default"
                                                        style="margin-left:30px;margin-top:-6px;">Export Excel
                                                </button>
                                                <input type="hidden" id="datos_a_enviar_anual"
                                                       name="datos_a_enviar_anual"/>
                                            </form>
                                        </div>
                                        <h1 id='error' style="display:none;">No se encontraron resultados.</h1>
                                        <div style="width:900px;">
                                            <table class="table table-hover" id="pagosTablaAnual">
                                                <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Sede</th>
                                                    <th>Curso</th>
                                                    <th>Alumno</th>
                                                    <th>Monto Abonado</th>
                                                    <th>Mes Abonado</th>
                                                    <th>Total Ingresado en el D&iacute;a</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <!-- <tfoot>
                                                  <tr>
                                                      <td colspan="5" style="text-align: left;">
                                                          <input class="btn" type="button" id="addrow" value="Add Row" />
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <td colspan="">Grand Total: $<span id="grandtotal"></span>

                                                      </td>
                                                  </tr>
                                              </tfoot> -->
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("includes/footer"); ?>
<script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
</script>
</body>
</html>


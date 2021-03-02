<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FICHA AFILIACION PDF</title>
</head>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background: url('{{ asset('img/logo/FONDO_PANTALLA.png') }}') center fixed no-repeat;
    }
    .contenido{
        margin: 0;
        padding: 0;
        background-color: rgba(255, 255, 255, 0.637)
    }
    table {
        border-collapse: separate;
        font: normal 10px verdana, arial, helvetica, sans-serif;
        width: 100%;
    }
    table tr{ 
        margin: 0;
        padding: 0;
    }
    tr td{
        margin: 0;
        padding: 0;
    }
    .nro-ficha{
        margin-left: 50px;
        padding: 0;
        left: 45px;
        border: 1px solid #000 ;
        height: 25px;
        width: 150px
    }
    .cont-fecha{
        margin: 0;
        padding:0;
        border: 1px solid #000000;
        height: 25px;
        width: 150px
    }
    .image{
        margin-left: 50px;
        padding: 0;
        border: 1px solid #000000;
        width: 150px;
        height: 170px;
    }
    .ubigeo, .info-per, .ubigeonac{
        margin: 5px;
        padding: 0px;
        border: 1px solid #000000;
        height: 20px;
    }
    .huella{
        margin: 5px;
        margin-left: 50px;
        padding: 0px;
        border: 1px solid #000000;
        height: 120px;
        width: 100px;
    }
    .footer{
        margin-top: 150px;
        border-bottom: 2px solid #000000;
    }
    .contexto-p{
        text-indent: 150px;
        font-size: 14px;
        text-align: justify;
    }
    p{
        margin: 5px;
        text-align: center;
    }
</style>
<body>
    <div class="documento">
        <div class="contenido">
            <table border="0">
                <thead>
                    <tr>
                        <td colspan="2" width=350><h2 style="text-align:center;">FICHA DE AFILIACION N°</h2></td>
                        <th><div class="nro-ficha"></div></th>
                    </tr>
                    <tr>
                        <th colspan="2"><h1>PARTIDO POLÍTICO RESTAURACION NACIONAL:</h1></th>
                        <td rowspan="3"><div class="image"><img src="{{ asset('storage/'.$urlfile) }}" alt="" width="150px" height="170px"></div></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2"><strong>Alcance de la organizacion Politica: Nacional ( &nbsp; &nbsp;) Regional (&nbsp; &nbsp;)</strong></td>
                    </tr>
                    <tr>
                        <td><h3>FECHA DE AFILIACIÓN</h3></td>
                        <td><div class="cont-fecha"><p>{{ date("d / m / yy",strtoTime($request->fecha_afiliacion)) }}</p></div></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p class="contexto-p">
                                Por medio de la presente ficha manifiesto mi decisión de <strong>AFILIARME</strong> al 
                            <strong>PARTIDO POLÍTICO RESTAURACIÓN NACIONAL</strong>, comprometiéndome a cumplir con sus
                            <strong>ESTATUTOS</strong> y demas normas internas del Partido Político. En fe de lo cual firmo la
                            presente ficha de afiliación:
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <div class="titulo">
                    <h4>DATOS PERSONALES:</h4>
                </div>
            </div>
            <table border="0">
                <tbody>
                    <tr>
                        <th>Apellido Paterno</th>
                        <th>Apellodo Materno</th>
                        <th colspan="2">Nombres</th>
                    </tr>
                    <tr>
                        <td><div class="info-per"><p>{{ $request->apellidopat }}</p></div></td>
                        <td><div class="info-per"><p>{{ $request->apellidomat }}</p></div></td>
                        <td colspan="2"><div class="info-per"><p>{{ $request->nombre }}</p></div></td>
                    </tr>
                    <tr>
                        <th>DNI</th>
                        <th>Fecha Nacimiento</th>
                        <th>Estado Civil</th>
                        <th>Sexo</th>
                    </tr>
                    <?php $da = getEstadoCivil();?>
                    
                    <tr>
                        <td><div class="info-per"><p>{{ $request->dni }}</p></div></td>
                        <td><div class="info-per"><p>{{ date("d / m / yy",strtoTime($request->fechanac ))}}</p></div></td>
                        <td><div class="info-per"><p>{{ strtoupper($da[$request->estacivil]) }}</p></div></td>
                        <td><div class="info-per"><p>@if($request->sexo = 1) MASCULINO @else FEMENINO @endif</p></div></td>
                    </tr>
                    <tr>
                        <th colspan="4">Lugar de Nacimiento</th>
                    </tr>
                    <tr>
                        <td colspan="4"><div class="ubigeonac"><p>{{ $request->ubigeonac }}</p></div></td>
                    </tr>
                </tbody>
            </table>
            <div class="titulo">
                <h4>DOMICILO ACTUAL:</h4>
            </div>
            <table>
                <tbody>
                    <tr>
                        <th>Region</th>
                        <th>Provincia</th>
                        <th>Distrito</th>
                    </tr>
                    <tr>
                        <td><div class="ubigeo"><p>{{ strtoupper($ubigeo->region) }}</p></div></td>
                        <td><div class="ubigeo"><p>{{ strtoupper($ubigeo->provincia) }}</p></div></td>
                        <td><div class="ubigeo"><p>{{ strtoupper($ubigeo->distrito) }}</p></div></td>
                    </tr>
                    <tr>
                        <th colspan="2"><p>Avenida/Calle/Jirón</p></th>
                        <th>Número</th>
                    </tr>
                    <tr>
                        <td colspan="2"><div class="info-per"><p>{{ $request->avenida }}</p></div></td>
                        <td><div class="info-per"><p>{{ $request->nro }}</p></div></td>
                    </tr>
                    <tr>
                        <th colspan="2"><p>Urbanización/Sector/Caserío</p></th>
                        <th>Télefono</th>
                    </tr>
                    <tr>
                        <td colspan="2"><div class="info-per"><p>{{ $request->sector }}</p></div></td>
                        <td><div class="info-per"><p>{{ $request->phone }}</p></div></td>
                    </tr>
                    <tr>
                        <th colspan="3">Correo Electrónico</th>
                    </tr>
                    <tr>
                        <td colspan="3"><div class="info-per"><p>{{ $request->correo }}</p></div></td>
                    </tr>
                </tbody>
            </table>
            <table border="0">
                <tbody>
                    <tr>
                        <th>&nbsp;</th>
                        <th width="150" class="footer">&nbsp;</th>
                        <th rowspan="2">
                            <div class="huella"></div>
                        </th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th>FIRMA DEL AFILIADO</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

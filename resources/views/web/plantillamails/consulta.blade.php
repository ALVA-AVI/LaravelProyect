<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $msg['tema'] }}</title>
</head>
<body>
    <div style="padding: 1%;margin:2%;align-content: center;font-family: 'Roboto' serif;">
        <strong style="font-size: 1.5em;">
            {{ $msg['tema'] }}
        </strong>
        <div class="contenido">
            <div style="padding:10px;width: 45%;">
                Hola mi estimado,<br>
                Soy {{ $msg['nombre'] }}&nbsp;{{ $msg['apellido'] }} un placer contactar con ud. y solicitarle:
                <p style="font-family:'Roboto',serif;">{{ $msg['contexto'] }}</p>
    
                <p style="font-family:'Roboto',serif;">Sin mas que agregar, me despido espero su respuesta.</p>
    
                <p style="font-family:'Roboto',serif;">Contactar a:<br>
                    correo :<strong>{{ $msg['correo'] }}</strong><br>
                    telefono: <strong>{{  $msg['celular'] }}</strong>
                </p>
            </div>
            <div class="footer">
    
            </div>
        </div>
    </div>
</body>
</html>
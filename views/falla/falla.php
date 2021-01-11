<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina no encontrada</title>
    <script src="https://kit.fontawesome.com/471047becf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <style>
            :root {
        --verdePrimario: #44f56fff;
        --verdeClaro: #94f7a8ff;
        --verdeFondo: #dffce4ff;
        --verdeOscuro: #37c258ff;
        --verdeFont: #217535ff;
        --openSans: 'Open Sans', sans-serif;
        --roboto: 'Roboto', sans-serif;
        --fjalla: 'Fjalla One', sans-serif;
        }

        html {
            font-size: 62.5%;
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        body {
            background-color: var(--verdeFondo);
            font-size: 1.6rem;
            font-family: var(--roboto);
            color: var(--verdeFont);
        }

        h2 {
            text-transform: uppercase;
        }

        p {
            margin: 0;
            padding: 0;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: var(--verdeFont);
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 100%;
        }

        .contenedor {
            max-width: 900px;
            margin: 0 auto;
        }

        .contenedor-flex {
            display: flex;
        }

        .btn {
            padding: 1rem 2rem;
            background-color: var(--verdeOscuro);
            border-radius: 5px;
            border: none;
        }


        /*Header*/

        header,
        footer {
            background-color: var(--verdePrimario);
        }

        .header {
            padding: 1rem;
            justify-content: space-between;
            align-items: center;
        }

        .logo h1>a {
            font-size: 5rem;
            font-family: var(--openSans);
            text-transform: uppercase;
        }
        main{
            text-align:center;
            
        }
        p.encabezado{
            font-size:3.5rem;
            font-weight:bold;
            margin:4rem 0;
        }
        i{
            font-size:10rem;
            margin-bottom:2rem;
        }
        p.txt{
            font-size:2.5rem;
            margin-bottom:4rem;
        }
       
    </style>
</head>
<body>
     <header>
        <div class="contenedor contenedor-flex header">
            <div class="logo">
                <h1><a href="<?php echo URL; ?>">El Puestito</a></h1>

            </div>

        </div>
    </header>

    <main>
        <div class="contenedor">
        <p class="encabezado">Pagina no encontrada</p>
        <i class="fas fa-exclamation-triangle"></i>
        <p class="txt">Lo sentimos hubo un error en la solicitud o no existe la página</p>
        </div>
        
    </main>
    
</body>
</html>
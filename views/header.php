<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Puestito</title>
    <link rel="shortcut icon" type="image/x-icon" href="website-icon.png" />
    <script src="https://kit.fontawesome.com/471047becf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Open+Sans:wght@400;600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/style/normalize.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/style/style.css">
</head>

<body>
    <header>
        <div class="contenedor contenedor-flex header">
            <div class="logo">
                <h1><a href="<?php echo URL; ?>">El Puestito</a></h1>

            </div>
            <div class="buscador contenedor-flex">
                <div class="input-search">
                    <input type="search" name="" id="busqueda">
                </div>
                <div class="icon-search">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <nav class="navegacion">
                <ul class="contenedor-flex">
                    <li><a href="<?php echo URL; ?>categorias"><i class="fas fa-tag"></i></a></li>
                    <li>
                        <?php echo checkItemsCarritoIcon(); ?>
                        
                        <ul class="sub-menu">
                        <?php echo checkLoginNavCarrito(); ?>
                        </ul>
                    </li>
                    <li id="profile-icon">
                        <a href="<?php echo URL; ?>cuenta"><i class="fas fa-user"></i></a>
                        
                            <ul class="sub-menu">
                                <?php echo checkLoginNavCuenta(); ?>
                            </ul>
                        
                        
                    </li>
                </ul>
            </nav>
        </div>
    </header>
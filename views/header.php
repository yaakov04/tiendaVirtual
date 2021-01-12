<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Puestito</title>
    <script src="https://kit.fontawesome.com/471047becf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Open+Sans:wght@400;600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
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
                    <input type="search" name="" id="">
                </div>
                <div class="icon-search">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <nav class="navegacion">
                <ul class="contenedor-flex">
                    <li><a href="#"><i class="fas fa-tag"></i></a></li>
                    <li><a href="<?php echo URL; ?>carrito"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="<?php echo URL; ?>cuenta"><i class="fas fa-user"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>